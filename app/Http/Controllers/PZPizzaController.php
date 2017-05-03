<?php namespace App\Http\Controllers;

use App\Models\PZPizza;
use Illuminate\Routing\Controller;

class PZPizzaController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pzpizza
	 *
	 * @return Response
	 */
	public function index()
	{
		return PZPizza::with(['clients'])->get();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pzpizza/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pzpizza
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pzpizza/{id}
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
	 * GET /pzpizza/{id}/edit
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
	 * PUT /pzpizza/{id}
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
	 * DELETE /pzpizza/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}