<?php namespace App\Http\Controllers;

use App\Models\PZCheese;
use App\Models\PZClients;
use App\Models\PZIngredients;
use App\Models\PZPizza;
use App\Models\PZPizzaPad;
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
        $configuration = [];
        $configuration['pizzas'] = PZPizza::with(['clients', 'pizzapad', 'cheese', 'ingredients'])->get()
        ->toArray();
        return view('pizza.index', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pzpizza/create
	 *
	 * @return Response
	 */
	public function create()
	{
        $config = $this->getFormData();

        return view('pizzacreate',$config);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pzpizza
	 *
	 * @return Response
	 */
	public function store()
	{
        $config = $this->getFormData();

        $data = request()->all();
//        dd($data);
        if(sizeof($data['ingredients']) > 3)
        {
            $config['error'] = ['message' => 'galima rinktis tik 3' ];

            return view('pizzacreate',$config);
        }

        $record = PZPizza::create(array(
           'name' => $data['name'],
            'client_id' => $data['clients'],
            'pizzpad_id' => $data['pizzaPad'],
            'chees_id' => $data['cheese'],
        ));

        $record->ingredients()->sync($data['ingredients']);

        return view('pizzacreate', $config);
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


	public function getFormData()
    {
        $config['pizzaPad'] = PZPizzaPad::pluck('name','id')->toArray();
        $config['cheese'] = PZCheese::pluck('name','id')->toArray();
        $config['ingredients'] = PZIngredients::pluck('names','id')->toArray();
        $config['clients'] = PZClients::pluck('name', 'id')->toArray();

        return $config;
    }

}