<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $quotes = Quote::query()->select('state',Quote::raw('count(state)') )->groupBy('state')->get();

        return view('quotes.index', ['quotes' => $quotes]);
    }

    
}
