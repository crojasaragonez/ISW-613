<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ingredients = Ingredient::query()->orderBy('id');

        if ($request->has('id') && $request->id) {
            $ingredients->where('id', $request->id);
        }

        if ($request->has('name') && $request->name) {
            $ingredients->where('name', 'ilike', "%$request->name%");
        }
        if ($request->has('unit') && $request->unit) {
            $ingredients->where('unit', 'ilike', "%$request->unit%");
        }

        if ($request->has('quantity') && $request->quantity) {
            $ingredients->where('quantity', 'ilike', "%$request->quantity%");
        }

        return view('ingredients.index', ['ingredients' => $ingredients->paginate(12)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
        ]);

        Ingredient::create($request->all());
        return redirect('/ingredients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ingredients = Ingredient::find($id);
        return view('ingredients.edit', ['ingredients' => $ingredients]);
    }

    public function delete($id)
    {
        $ingredients = Ingredient::find($id);
        return view('ingredients.delete', ['ingredients' => $ingredients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit' => 'required',
            'quantity' => 'required'
        ]);
        $ingredients = Ingredient::find($request->id);
        $ingredients->update($request->all());
        return redirect('/ingredients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ingredient::destroy($id);
        return redirect('/ingredients');
    }
}
