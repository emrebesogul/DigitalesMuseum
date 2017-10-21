<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description, portrait_filename
                FROM people');

            return view('admin.people',['people' => json_decode(json_encode($result),true)]);

        } else
        {
            return view('action', [
                'infoMessage' => 'Kein Zugriff.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            $epochs = DB::select('SELECT id, name
                FROM epochs');

            return view('admin.personCreate', ['epochs' => json_decode(json_encode($epochs),true)]);

        } else
        {
            return view('action', [
                'infoMessage' => 'Kein Zugriff.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            if ($request->filled(['edit-form-data-name', 'edit-form-data-birthdate']))
            {

                $result = DB::select('SELECT COUNT(id) AS person_count
                    FROM people
                    WHERE name = :name AND birthday = :birthday', [
                        'name' => $request->input('edit-form-data-name'),
                        'birthday' => $request->input('edit-form-data-birthdate')
                        ]);


                if($result[0]->person_count == 0)
                {
                    $result = DB::insert('INSERT INTO people (name, birthday, location, date_of_death, short_description)
                        VALUES (:name, :birthay, :location, :date_of_death, :short_description)', [
                        'name' => $request->input('edit-form-data-name'),
                        'birthay' => $request->input('edit-form-data-birthdate'),
                        'location' => $request->input('edit-form-data-location'),
                        'date_of_death' => $request->input('edit-form-data-deathdate'),
                        'short_description' => $request->input('edit-form-data-short-description')
                    ]);

                    $personID = DB::getPdo()->lastInsertId();

                    if($request->has('edit-form-data-profile-picture'))
                    {
                        $portrait = $request->file('edit-form-data-profile-picture');
                        $randomString = str_random(384);
                        $filename = hash('sha384', $randomString) .'.'. $portrait->getClientOriginalExtension();

                        $portrait->move('storage/people/portraits/', $filename);

                        $result = DB::update('UPDATE people
                            SET portrait_filename = :portrait_filename
                            WHERE id = :id ', [
                                'id' => $personID,
                                'portrait_filename' => $filename
                            ]);
                    }

                    if( $request->input('edit-form-data'))
                    {
                        foreach($request->input('edit-form-data') AS $entry)
                        {

                            if($entry['type'] == 'video')
                            {
                                $result = DB::insert('INSERT INTO videos (person_id, url)
                                    VALUES (:person_id, :url)', [
                                    'person_id' => $personID,
                                    'url' => $entry['content']
                                ]);
                            }

                            if($entry['type'] == 'text')
                            {
                                $result = DB::insert('INSERT INTO texts (person_id, content, text_index)
                                    VALUES (:person_id, :content, :text_index)', [
                                    'person_id' => $personID,
                                    'content' => $entry['content'],
                                    'text_index' => $entry['index']
                                ]);
                                

                            }

                         }
                    }

                    if(isset($request->files->all()['edit-form-pictures']))
                    {
                        foreach($request->files->all()['edit-form-pictures'] AS $picture)
                        {

                            $randomString = str_random(384);
                            $filename = hash('sha384', $randomString) .'.'. $picture->getClientOriginalExtension();

                            $picture->move('storage/people/pictures/', $filename);

                            $result = DB::insert('INSERT INTO pictures (person_id, filename)
                                VALUES (:person_id, :filename)', [
                                'person_id' => $personID,
                                'filename' => $filename
                            ]);

                        }
                    }



                    if($request->has('form-poster-data'))
                    {
                        $poster = $request->file('form-poster-data');
                        $randomString = str_random(384);
                        $filename = hash('sha384', $randomString) .'.'. $poster->getClientOriginalExtension();

                        $poster->move('storage/people/posters/', $filename);

                        $result = DB::update('UPDATE people
                            SET poster_filename = :poster_filename
                            WHERE id = :id ', [
                                'id' => $personID,
                                'poster_filename' => $filename
                            ]);
                    }

                    

                    if( $request->input('edit-form-epoch-select'))
                    {
                        foreach($request->input('edit-form-epoch-select') AS $epochId)
                        {

                            $result = DB::insert('INSERT INTO people_are_in_epochs (person_id, epoch_id)
                                VALUES (:person_id, :epoch_id)', [
                                'person_id' => $personID,
                                'epoch_id' => $epochId
                            ]);
                            
                        }
                    }


                    return view('action', [
                        'infoMessage' => 'Person wurde erfolgreich angelegt.',
                        'icon' => 'icon_check_alt2',
                        'buttonLink' => '/admin/people',
                        'buttonLabel' => 'Zurück'
                    ]);

                } else{
                    return view('action', [
                        'infoMessage' => 'Diese Person existiert bereits.',
                        'icon' => 'icon_error-circle_alt',
                        'buttonLink' => '/admin/people',
                        'buttonLabel' => 'Zurück'
                    ]);
                }
            } else
            {
                return view('action', [
                    'infoMessage' => 'Falsche Eingabedaten.',
                    'icon' => 'icon_error-circle_alt',
                    'buttonLink' => '/admin/people',
                    'buttonLabel' => 'Zurück'
                ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'Kein Zugriff.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(parent::userIsAuthenticated())
        {
            $result = DB::select('SELECT people.id, name, birthday, location, date_of_death, short_description, portrait_filename, poster_filename
                FROM people
                WHERE id = :id',
                ['id' => $id]);

            $texts = DB::select('SELECT content, text_index
                FROM texts
                WHERE person_id = :person_id
                ORDER BY text_index ASC',[
                'person_id' => $id
            ]);

            $pictures = DB::select('SELECT filename
                FROM pictures
                WHERE person_id = :person_id',
                ['person_id' => $id]);


            $videos = DB::select('SELECT url
                FROM videos
                WHERE person_id = :id', [
                    'id' => $id
            ]);

            $youtubeVideos = array();
            foreach($videos as $video) {
                parse_str(parse_url($video->url, PHP_URL_QUERY), $youtubeUrlParameters);

                if(isset($youtubeUrlParameters['v']))
                {
                    $youtubeEmbedCode = '<iframe width="560" height="315" src="https://www.youtube.com/embed/'. $youtubeUrlParameters['v']. '"frameborder="0" allowfullscreen></iframe>';

                    array_push($youtubeVideos, [
                        'url' => $video->url,
                        'embedCode' => $youtubeEmbedCode
                    ]);
                }

            }

            return view('details.person',  ['id' => $result[0]->id, 'name' => $result[0]->name, 'birthday' => $result[0]->birthday, 'location' => $result[0]->location, 'date_of_death' => $result[0]->date_of_death, 'short_description' => $result[0]->short_description, 'videos' => $youtubeVideos, 'portrait_filename' => $result[0]->portrait_filename, 'poster_filename' => $result[0]->poster_filename, 'texts' => json_decode(json_encode($texts),true), 'pictures' => json_decode(json_encode($pictures),true)]);
        } else
        {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {

        if(parent::userIsAuthenticated())
        {
            $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description, portrait_filename
                FROM people
                ORDER BY birthday ASC');

            return view('timeline',['people' => json_decode(json_encode($result),true)]);
        } else
        {
            return redirect('/login');
        }
    }

    /**
     * Search for a person.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if(parent::userIsAuthenticated())
        {
            if(Input::has('q'))
            {
                $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description, portrait_filename
                    FROM people
                    WHERE name LIKE :name
                    OR short_description LIKE :short_description
                    OR location LIKE :location
                    OR year(birthday) = :birthyear
                    OR year(date_of_death) = :deathyear
                    ORDER BY birthday ASC', [
                        'name' => '%'.Input::get('q').'%',
                        'short_description' => '%'.Input::get('q').'%',
                        'birthyear' => Input::get('q'),
                        'deathyear' => Input::get('q'),
                        'location' => Input::get('q')
                    ]);

                return view('timeline',['people' => json_decode(json_encode($result),true)]);
            } else
            {
                return redirect('/');
            }
        } else
        {
            return redirect('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFiltered($id)
    {

        if(parent::userIsAuthenticated())
        {

            $result = DB::select('SELECT people.id, name, birthday, location, date_of_death, short_description, portrait_filename
                FROM people
                JOIN people_are_in_epochs ON people_are_in_epochs.person_id = people.id
                WHERE people_are_in_epochs.epoch_id = :id
                ORDER BY birthday ASC',[
                    'id' => $id]
                );

            return view('timeline',['people' => json_decode(json_encode($result),true)]);
        } else
        {
            return redirect('/login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description, portrait_filename, poster_filename
                FROM people
                WHERE id = :id',
                ['id' => $id]);

            if(isset($result[0]))
            {

            $texts = DB::select('SELECT content, text_index
                FROM texts
                WHERE person_id = :person_id
                ORDER BY text_index ASC',[
                'person_id' => $id
            ]);

            $pictures = DB::select('SELECT filename
                FROM pictures
                WHERE person_id = :person_id',
                ['person_id' => $id]);


            $videos = DB::select('SELECT url
                FROM videos
                WHERE person_id = :id', [
                'id' => $id
                ]);

            $epochs = DB::select('SELECT id, name
                FROM epochs');

            return view('admin.personEdit',  [
                'id' => $result[0]->id,
                'name' => $result[0]->name,
                'birthday' => $result[0]->birthday,
                'location' => $result[0]->location,
                'date_of_death' => $result[0]->date_of_death,
                'short_description' => $result[0]->short_description,
                'videos' => json_decode(json_encode($videos),true),
                'portrait_filename' => $result[0]->portrait_filename,
                'poster_filename' => $result[0]->poster_filename,
                'texts' => json_decode(json_encode($texts),true),
                'pictures' => json_decode(json_encode($pictures),true),
                'epochs' => json_decode(json_encode($epochs),true)
                ]);

            } else
            {
                return view('action', [
                    'infoMessage' => 'Die Person wurde nicht gefunden.',
                    'icon' => 'icon_error-circle_alt',
                    'buttonLink' => '/admin/people',
                    'buttonLabel' => 'Zurück'
                ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'Kein Zugriff.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            if ($request->filled(['edit-form-data-name', 'edit-form-data-birthdate']))
            {


                $result = DB::update('UPDATE people
                    SET name = :name,
                        birthday = :birthday,
                        location = :location,
                        date_of_death = :date_of_death,
                        short_description = :short_description
                    WHERE id = :id', [
                        'id' => $id,
                        'name' => $request->input('edit-form-data-name'),
                        'birthday' => $request->input('edit-form-data-birthdate'),
                        'location' => $request->input('edit-form-data-location'),
                        'date_of_death' => $request->input('edit-form-data-deathdate'),
                        'short_description' => $request->input('edit-form-data-short-description')
                    ]);


                    if($request->has('edit-form-data-profile-picture'))
                    {
                        $portrait = $request->file('edit-form-data-profile-picture');
                        $randomString = str_random(384);
                        $filename = hash('sha384', $randomString) .'.'. $portrait->getClientOriginalExtension();

                        $portrait->move('storage/people/portraits/', $filename);

                        $result = DB::update('UPDATE people
                            SET portrait_filename = :portrait_filename
                            WHERE id = :id ', [
                                'id' => $id,
                                'portrait_filename' => $filename
                            ]);
                    }

                    if( $request->input('edit-form-data'))
                    {
                        $result = DB::delete('DELETE 
                            FROM texts 
                            WHERE person_id = :person_id ', [
                            'person_id' => $id
                            ]);

                        $result = DB::delete('DELETE 
                            FROM videos 
                            WHERE person_id = :person_id', [
                            'person_id' => $id
                            ]);

                        foreach($request->input('edit-form-data') AS $entry)
                        {

                            if($entry['type'] == 'video')
                            {

                                $result = DB::insert('INSERT INTO videos (person_id, url)
                                    VALUES (:person_id, :url)', [
                                    'person_id' => $id,
                                    'url' => $entry['content']
                                ]);
                            }

                            if($entry['type'] == 'text')
                            {

                                $result = DB::insert('INSERT INTO texts (person_id, content, text_index)
                                    VALUES (:person_id, :content, :text_index)', [
                                    'person_id' => $id,
                                    'content' => $entry['content'],
                                    'text_index' => $entry['index']
                                ]);
                            
                            }

                         }
                    }

                    if(isset($request->files->all()['edit-form-pictures']))
                    {
                        $result = DB::delete('DELETE 
                            FROM pictures 
                            WHERE person_id = :person_id', [
                            'person_id' => $id
                            ]);

                        foreach($request->files->all()['edit-form-pictures'] AS $picture)
                        {

                            $randomString = str_random(384);
                            $filename = hash('sha384', $randomString) .'.'. $picture->getClientOriginalExtension();

                            $picture->move('storage/people/pictures/', $filename);

                            $result = DB::insert('INSERT INTO pictures (person_id, filename)
                                VALUES (:person_id, :filename)', [
                                'person_id' => $id,
                                'filename' => $filename
                            ]);

                        }
                    }


                    if($request->has('form-poster-data'))
                    {
                        $poster = $request->file('form-poster-data');
                        $randomString = str_random(384);
                        $filename = hash('sha384', $randomString) .'.'. $poster->getClientOriginalExtension();

                        $poster->move('storage/people/posters/', $filename);

                        $result = DB::update('UPDATE people
                            SET poster_filename = :poster_filename
                            WHERE id = :id ', [
                                'id' => $id,
                                'poster_filename' => $filename
                            ]);
                    }

                    if( $request->input('edit-form-epoch-select'))
                    {
                        foreach($request->input('edit-form-epoch-select') AS $epochId)
                        {
                            // Hier checken ob Person schon in der Epoche ist
                            $result = DB::select('SELECT COUNT(id) AS epoch_count
                            FROM people_are_in_epochs
                            WHERE person_id = :person_id AND epoch_id = :epoch_id', [
                                'person_id' => $id,
                                'epoch_id' => $epochId
                                ]);
        
        
                            if($result[0]->epoch_count == 0)
                            {
                                $result = DB::insert('INSERT INTO people_are_in_epochs (person_id, epoch_id)
                                    VALUES (:person_id, :epoch_id)', [
                                    'person_id' => $id,
                                    'epoch_id' => $epochId
                                ]);
                            }
                        }
                    }

                    return view('action', [
                        'infoMessage' => 'Person wurde erfolgreich bearbeitet.',
                        'icon' => 'icon_check_alt2',
                        'buttonLink' => '/admin/people',
                        'buttonLabel' => 'Zurück'
                    ]);
            } else
            {
                return view('action', [
                    'infoMessage' => 'Person konnte nicht bearbeitet werden.',
                    'icon' => 'icon_error-circle_alt',
                    'buttonLink' => 'javascript:history.back()',
                    'buttonLabel' => 'Zurück'
                ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'Kein Zugriff.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            $result = DB::delete('DELETE
                FROM people
                WHERE id = :id',
                ['id' => $id]);

            if($result)
            {
             return view('action', [
                 'infoMessage' => 'Die Person wurde erfolgreich entfernt.',
                 'icon' => 'icon_check_alt2',
                 'buttonLink' => '/admin/people',
                 'buttonLabel' => 'Zurück'
             ]);
            } else
            {
             return view('action', [
                 'infoMessage' => 'Die Person konnte nicht gelöscht werden.',
                 'icon' => 'icon_error-circle_alt',
                 'buttonLink' => '/admin/people',
                 'buttonLabel' => 'Zurück'
             ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'Kein Zugriff.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
    }
}
