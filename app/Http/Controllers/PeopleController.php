<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('people',['people' => json_decode(json_encode($result),true)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('personCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->filled(['name', 'birthday', 'location', 'date_of_death', 'short_description'])) 
        {
            // können namen doppelt auftreten?
            $result = DB::select('SELECT COUNT(id) AS person_count
                FROM people
                WHERE name = :name',
                ['name' => $request->input('name')]);

            if($result[0]->user_count == 0)
            {
                $result = DB::insert('INSERT INTO people (name, birthday, location, date_of_death, short_description) VALUES (:name, :birthay, :location, :date_of_death, :short_description)', [
                    'name' => $request->input('name'),
                    'birthay' => $request->input('birthday'),
                    'location' => $request->input('location'),
                    'date_of_death' => $request->input('date_of_death'),
                    'short_description' => $request->input('short_description')
                ]);
                //return view('/', ['registerSuccesful' => true]);
            } else{
               //return view('/login', ['infoMessage' => 'User already exists!', 'email' => $request->input('email')]); 
            }
        } else 
        {
            //return view('/register', ['registerSuccesful' => false, 'infoMessage' => 'Wrong Data!']);
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
            print_r($result[0]->name);
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

        return view('admin.editPerson', ['id' => $result[0]->id, 'name' => $result[0]->name, 'birthday' => $result[0]->birthday, 'location' => $result[0]->location, 'date_of_death' => $result[0]->date_of_death, 'short_description' => $result[0]->short_description]);
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
        if ($request->filled(['name', 'birthday', 'location', 'date_of_death', 'short_description'])) 
        {
            $result = DB::update('UPDATE people 
                SET name = :name,
                    birthday = :birthday,
                    location = :location,
                    date_of_death = :date_of_death,
                    short_description = :short_description
                WHERE id = :id', [
                    'id' => $id,
                    'name' => $request->input('name'),
                    'birthay' => $request->input('birthday'),
                    'location' => $request->input('location'),
                    'date_of_death' => $request->input('date_of_death'),
                    'short_description' => $request->input('short_description')
                ]);
            //return view('/action', [$infoMessage = "Update successful"]);
        } else 
        {
            //return view('/action', [$infoMessage = "Update not successful"]);
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
            //return view('/action', [$infoMessage = "Person successfully removed"]);
       } else
       {
            //return view('/action', [$infoMessage = "Person not removed"]);
       }

    }
}
