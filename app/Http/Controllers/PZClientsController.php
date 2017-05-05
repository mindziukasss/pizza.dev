<?php namespace App\Http\Controllers;

use App\Models\PZClients;
use Illuminate\Routing\Controller;

class PZClientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pzclients
	 *
	 * @return Response
	 */
	public function index()
	{
	    $data['clients'] = PZClients::all();

        return view('client.index', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pzclients/create
	 *
	 * @return Response
	 */
	public function create()
	{
	    $config = $this->getFormData();

        return view('client.create', $config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pzclients
	 *
	 * @return Response
	 */
	public function store()
	{
	    $config = $this->getFormData();
        $data = request()->all();
        if(!isset($data['name']))
        {
            $config['error'] = ['message' => 'Irasykite varda'];

            return view('client.create', $config);
        }

        if(!isset($data['phone_nr']))
        {
            $config['error'] = ['message' => 'Irasykite telefona'];

            return view('client.create', $config);
        }
          PZClients::create(array(
            'name' => $data['name'],
            'phone_nr' => $data['phone_nr'],
            'address' => $data['address'],
        ));
        return view('client.create', $config);
	}

	/**
	 * Display the specified resource.
	 * GET /pzclients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pzclients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pzclients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pzclients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getFormData()
    {
        $config['clients'] = PZClients::pluck('name', 'id')->toArray();

        return $config;
    }

}