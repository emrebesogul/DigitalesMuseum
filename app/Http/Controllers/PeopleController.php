<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description
            FROM people');      
        return view('admin.people',['people' => json_decode(json_encode($result),true)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.personCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->filled(['edit-form-data-name', 'edit-form-data-birthdate', 'edit-form-data-deathdate', 'edit-form-data'])) 
        {
            
            $result = DB::select('SELECT COUNT(id) AS person_count
                FROM people
                WHERE name = :name AND birthday = :birthday AND date_of_death = :date_of_death', [
                    'name' => $request->input('edit-form-data-name'),
                    'birthday' => $request->input('edit-form-data-birthdate'),
                    'date_of_death' => $request->input('edit-form-data-deathdate')
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

                if($request->has('edit-form-data-profile-picture'))
                {
                    $portrait = $request->file('edit-form-data-profile-picture');
                    $randomString = str_random(384);
                    $filename = hash('sha384', $randomString) .'.'. $portrait->getClientOriginalExtension();

                    $portrait->move('storage/people/portraits/', $filename);
                    $personId = DB::getPdo()->lastInsertId();
                    
                    $result = DB::update('UPDATE people 
                        SET portrait_filename = :portrait_filename
                        WHERE id = :id ', [
                            'id' => DB::getPdo()->lastInsertId(),
                            'portrait_filename' => $filename
                        ]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description
            FROM people
            WHERE id = :id',
            ['id' => $id]); 
            return view('details.person',  ['id' => $result[0]->id, 'name' => $result[0]->name, 'birthday' => $result[0]->birthday, 'location' => $result[0]->location, 'date_of_death' => $result[0]->date_of_death, 'short_description' => $result[0]->short_description]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $result = DB::select('SELECT id, name, birthday, location, date_of_death, short_description
            FROM people
            WHERE id = :id',
            ['id' => $id]); 

        if(isset($result[0]))
        {
            return view('admin.personEdit', ['id' => $result[0]->id, 'name' => $result[0]->name, 'birthday' => $result[0]->birthday, 'location' => $result[0]->location, 'date_of_death' => $result[0]->date_of_death, 'short_description' => $result[0]->short_description]);
        } else
        {
            return view('action', [
                'infoMessage' => 'Die Person wurde nicht gefunden.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/admin/people',
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
        if ($request->filled(['edit-form-data-name', 'edit-form-data-birthdate', 'edit-form-data-deathdate', 'edit-form-data'])) 
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
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

    }
}
