<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        print_r(session('userId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {        
        if ($request->filled(['name', 'email', 'password'])) 
        {
            // user schon vorhanden?
            // alle daten eigegeben?
            // email entspricht anforderungen?
            
            print_r("1");
        } else
        {
            print_r("2");
        }

        $result = DB::insert('INSERT INTO users (name, email, password, is_admin) VALUES (:name, :email, :password, 0)', [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT)
        ]);

    }

    /**
     * Login for users.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {

        if ($request->filled(['email', 'password'])) 
        {
            $result = DB::select('SELECT id, name, password, is_admin
                FROM users
                WHERE email = :email',
                ['email' => $request->input('email')]);
            
            if(password_verify($request->input('password'), $result[0]->password))
            {
                session(['userId' => $result[0]->id, 'userIsAdmin' => (bool) $result[0]->is_admin]);
                return redirect('/');
            }
        }


        





        /**
         * Hole Daten aus request
         * Überprüfe Daten in der Datenbank
         * Mit response antworten
         *  Falls valide: return redirect('/');
         *  Falls wrong: return redirect('login') mit fehlermeldung
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(parent::userIsAuthenticated() && parent::userIsAdmin())
        {
            $result = DB::select('SELECT id, name, email, is_admin
            FROM users
            WHERE id = :id',
            ['id' => $id]);
            
        } else
        {
            return redirect('/error');
        }
        
    }

}
