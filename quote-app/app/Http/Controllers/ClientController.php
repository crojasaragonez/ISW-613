<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::query()->orderBy('id');

        if ($request->has('id') && $request->id) {
            $clients->where('id', $request->id);
        }

        if ($request->has('name') && $request->name) {
            $clients->where('name', 'ilike', "%$request->name%");
        }

        if ($request->has('email') && $request->email) {
            $clients->where('email', 'ilike', "%$request->email%");
        }

        return view('clients.index', ['clients' => $clients->paginate(12)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        Forma Larga
        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->save();
        Forma Corta:
        */
        try{
            $request->validate([
                'name' => 'required',
                'email' => 'required|email'
            ]);

            Client::create($request->all());
        }catch (\Throwable $th) {
        return response('Error', 500);
    }
        return redirect('/clients');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $client = Client::find($id);
            return view('clients.edit', ['client' => $client]);
        }catch (\Throwable $th) {
            return response('Error', 500);
        }
    }

    public function delete($id)
    {
        try{
            $client = Client::find($id);
            return view('clients.delete', ['client' => $client]);
        }catch (\Throwable $th) {
            return response('Error', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
            $request->validate([
            'name' => 'required',
            'email' => 'required|email'
            ]);
            $client = Client::find($request->id);
            $client->update($request->all());
            return redirect('/clients');
        }catch (\Throwable $th) {
            return response('Error', 500);
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Client::destroy($id);
            return redirect('/clients');
        }catch (\Throwable $th) {
            return response('Error', 500);
        }
    }
}
