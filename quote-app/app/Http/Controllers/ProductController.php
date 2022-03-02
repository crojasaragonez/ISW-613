<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\IngredientProduct;
use App\Models\Ingredient;
use Illuminate\Http\Request;

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
        try{
        $request->validate([
            'name' => 'required',
        ]);

        Product::create($request->all());
        }catch (\Throwable $th) {
            return response('Error', 200);
    }
        return redirect('/products');
    }

    public function recipe(Request $request, $id)
    {
        try{
            if ($request->isMethod('post')) {
            IngredientProduct::create($request->all());
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
        }catch (\Throwable $th) {
        return response('Error', 200);
    }
    }

    public function removeIngredient(Request $request)
    {
        try{

        IngredientProduct::where(['id' => $request->id, 'product_id' => $request->product_id])->delete();
        } catch (\Throwable $th) {
            return response('Error', 200);
        }

        return redirect("/products/$request->product_id/recipe");
    }

    public function delete($id)
    {
        try{
            $product = Product::find($id);
            return view('products.delete', ['product' => $product]);
        }catch (\Throwable $th) {
            return response('Error', 200);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $product = Product::find($id);
            return view('products.edit', ['product' => $product]);
        } catch (\Throwable $th) {
            return response('Error', 200);
        }
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
        try{
            $request->validate([
                'name' => 'required',
                'is_active' => 'required'
            ]);
            $product = Product::find($request->id);
            $product->update($request->all());
        } catch (\Throwable $th) {
            return response('Error', 200);
        }
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
        } catch (\Throwable $th) {
            return response('Error', 200);
        }
        return redirect('/products');
    }
}
