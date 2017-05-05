<?php namespace App\Http\Controllers;

use App\Models\PZCheese;
use App\Models\PZClients;
use App\Models\PZConnectionsIngredientsPizza;
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
        $config = [];
        $config['pizzas'] = PZPizza::with(['clients', 'pizzapad', 'cheese', 'ingredients'])->get()
        ->toArray();

        $ingredientsTop = [];
        foreach ($config['pizzas'] as $pizza)
        {
            foreach ($pizza['ingredients'] as $ingredient)
            {
                array_push($ingredientsTop, $ingredient['names']);
            }
        }
        $sum = array_count_values($ingredientsTop);
        arsort($sum);
        $config['ingredients'] = $sum;

        return view('pizza.index', $config);
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

        return view('pizza.create',$config);
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

        if(sizeof($data['ingredients']) > 3)
        {
            $config['error'] = ['message' => 'galima rinktis tik 3' ];

            return view('pizza.create',$config);
        }

        $pizzaPadCal = PZPizzaPad::where('id',$data['pizzaPad'])->value('calorie');
        $cheesCal = PZCheese::where('id', $data['cheese'])->value('calorie');

        $ingriediensCal = 0;

        for ($i = 0; $i < sizeof($data['ingredients']); $i++)
        {
            $ingriediensCal += PZIngredients::where('id', $data['ingredients'][$i])->value('calorie');
        }

        $pizzaCalsum = $pizzaPadCal + $cheesCal + $ingriediensCal;

        $record = PZPizza::create(array(
           'name' => $data['name'],
            'client_id' => $data['clients'],
            'pizzpad_id' => $data['pizzaPad'],
            'chees_id' => $data['cheese'],
            'calories' => $pizzaCalsum
        ));


        $record->ingredients()->sync($data['ingredients']);

        return view('pizza.create', $config);
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
        $config['pizza'] = PZPizza::with(['clients', 'pizzapad', 'cheese', 'ingredients'])->find($id);

        return view('pizza.show', $config);
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
        $config = $this->getFormData();
        $config['pizza'] = PZPizza::with(['clients', 'pizzapad', 'cheese', 'ingredients'])->find($id)->toArray();
        $config['route'] = route('pizza.edit', $id);
        $data = [];
        foreach ($config['pizza']['ingredients'] as $ingredient )
        {
            array_push($data , $ingredient['id']);
        }
        $config['pizzaIngredients'] = $data;
		return view('pizza.edit', $config);

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

        $record = PZPizza::find($id);
        $data = request()->all();

        $pizzaPadCal = PZPizzaPad::where('id',$data['pizzaPad'])->value('calorie');
        $cheesCal = PZCheese::where('id', $data['cheese'])->value('calorie');

        $ingriediensCal = 0;

        for ($i = 0; $i < sizeof($data['ingredients']); $i++)
        {
            $ingriediensCal += PZIngredients::where('id', $data['ingredients'][$i])->value('calorie');
        }

        $pizzaCalsum = $pizzaPadCal + $cheesCal + $ingriediensCal;

        $record->update([
            'name' => $data['name'],
            'client_id' => $data['clients'],
            'pizzpad_id' => $data['pizzaPad'],
            'chees_id' => $data['cheese'],
            'calories' => $pizzaCalsum
        ]);

        $record->ingredients()->sync($data['ingredients']);

        return redirect()->route('pizza');
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
// $config = $this->getFormData();
//        $pizza = PZPizza::find($id);
//        $pizza->delete();
    PZConnectionsIngredientsPizza::where('pizza_id', $id)->forceDelete();
    PZPizza::destroy($id);
        return redirect()->route('pizza');
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