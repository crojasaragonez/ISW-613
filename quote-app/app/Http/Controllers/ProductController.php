<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\IngredientProduct;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query()->orderBy('id');

        if ($request->has('id') && $request->id) {
            $products->where('id', $request->id);
        }

        if ($request->has('name') && $request->name) {
            $products->where('name', 'ilike', "%$request->name%");
        }

        return view('products.index', ['products' => $products->paginate(12)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
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
        ]);

        Product::create($request->all());
        alert()->success('Successfull','The product has been saved');
        return redirect('/products');
    }

    public function recipe(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            IngredientProduct::create($request->all());
            alert()->success('Successfull','The ingredient has been added to product');
            return redirect("/products/$id/recipe");
        }
        $product = Product::find($id);
        $ingredients = Ingredient::all();
        $recipe_ingredients = IngredientProduct::where('product_id', $product->id)->get();
        return view('products.recipe', [
            'product' => $product,
            'recipe_ingredients' => $recipe_ingredients,
            'ingredients' => $ingredients
        ]);
    }

    public function removeIngredient(Request $request)
    {
        IngredientProduct::where(['id' => $request->id, 'product_id' => $request->product_id])->delete();
        alert()->success('Successfull','The ingredient has been removed of product');
        return redirect("/products/$request->product_id/recipe");
    }

    public function delete($id)
    {
        $product = Product::find($id);
        return view('products.delete', ['product' => $product]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'is_active' => 'required'
        ]);
        $product = Product::find($request->id);
        $product->update($request->all());
        alert()->success('Successfull','The product has been updated');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);
            alert()->success('Successfull','The product has been deleted');
            return redirect('/products');
        } catch (\Throwable $th) {
            alert()->error('Error','Error to product delete');
            return redirect('/products');
        }

    }
}
