<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EpochsController extends Controller
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
            $result = DB::select('SELECT id, name, period_begin, period_end
                FROM epochs');

            return view('admin.epochs',['epochs' => json_decode(json_encode($result),true)]);

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showEpochs()
    {

        if(parent::userIsAuthenticated())
        {
            $result = DB::select('SELECT id, name, period_begin, period_end
                FROM epochs
                ORDER BY period_begin ASC');

            return view('epochs',['epochs' => json_decode(json_encode($result),true)]);

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
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
            return view('admin.epochCreate');

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
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
            if ($request->filled(['edit-form-data-epoch-name', 'edit-form-data-startdate', 'edit-form-data-enddate']))
            {
    
                $result = DB::select('SELECT COUNT(id) AS epoch_count
                    FROM epochs
                    WHERE name = :name', [
                        'name' => $request->input('name')
                    ]);
    
    
                if($result[0]->epoch_count == 0)
                {
                    $result = DB::insert('INSERT INTO epochs (name, period_begin, period_end)
                        VALUES (:name, :period_begin, :period_end)', [
                        'name' => $request->input('edit-form-data-epoch-name'),
                        'period_begin' => $request->input('edit-form-data-startdate'),
                        'period_end' => $request->input('edit-form-data-enddate')
                    ]);
                    return view('action', [
                        'infoMessage' => 'Epoche wurde erfolgreich angelegt.',
                        'icon' => 'icon_check_alt2',
                        'buttonLink' => '/admin/epochs',
                        'buttonLabel' => 'Zurück'
                    ]);
                } else{
                    return view('action', [
                        'infoMessage' => 'Diese Epoche existiert bereits.',
                        'icon' => 'icon_error-circle_alt',
                        'buttonLink' => '/admin/epochs',
                        'buttonLabel' => 'Zurück'
                    ]);
                }
            } else
            {
                return view('action', [
                    'infoMessage' => 'Falsche Eingabedaten.',
                    'icon' => 'icon_error-circle_alt',
                    'buttonLink' => '/admin/epochs',
                    'buttonLabel' => 'Zurück'
                ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
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
            $result = DB::select('SELECT id, name, period_begin, period_end
                FROM epochs
                WHERE id = :id',
                ['id' => $id]);
           
            return view('/epochs',  ['id' => $result[0]->id, 'name' => $result[0]->name, 'period_begin' => $result[0]->period_begin, 'period_end' => $result[0]->period_end]);

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
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
            $result = DB::select('SELECT id, name, period_begin, period_end
                FROM epochs
                WHERE id = :id',
                ['id' => $id]);

            return view('admin.epochEdit', ['id' => $result[0]->id, 'name' => $result[0]->name, 'period_begin' => $result[0]->period_begin, 'period_end' => $result[0]->period_end]);

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
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
            if ($request->filled(['edit-form-data-epoch-name', 'edit-form-data-startdate', 'edit-form-data-enddate']))
            {
                $result = DB::update('UPDATE epochs
                    SET name = :name,
                        period_begin = :period_begin,
                        period_end = :period_end
                    WHERE id = :id', [
                        'id' => $id,
                        'name' => $request->input('edit-form-data-epoch-name'),
                        'period_begin' => $request->input('edit-form-data-startdate'),
                        'period_end' => $request->input('edit-form-data-enddate')
                    ]);
                    return view('action', [
                        'infoMessage' => 'Epoche wurde erfolgreich bearbeitet.',
                        'icon' => 'icon_check_alt2',
                        'buttonLink' => '/admin/epochs',
                        'buttonLabel' => 'Zurück'
                    ]);
            } else
            {
                return view('action', [
                    'infoMessage' => 'Epoche konnte nicht bearbeitet werden.',
                    'icon' => 'icon_error-circle_alt',
                    'buttonLink' => '/admin/epochs',
                    'buttonLabel' => 'Zurück'
                ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
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
                FROM epochs
                WHERE id = :id',
                ['id' => $id]);

            if($result)
            {
             return view('action', [
                 'infoMessage' => 'Die Epoche wurde erfolgreich entfernt.',
                 'icon' => 'icon_check_alt2',
                 'buttonLink' => '/admin/epochs',
                 'buttonLabel' => 'Zurück'
             ]);
            } else
            {
             return view('action', [
                 'infoMessage' => 'Die Epoche konnte nicht gelöscht werden.',
                 'icon' => 'icon_error-circle_alt',
                 'buttonLink' => '/admin/epochs',
                 'buttonLabel' => 'Zurück'
             ]);
            }

        } else
        {
            return view('action', [
                'infoMessage' => 'No access.',
                'icon' => 'icon_error-circle_alt',
                'buttonLink' => '/',
                'buttonLabel' => 'Zurück'
            ]);
        }        

    }
}
