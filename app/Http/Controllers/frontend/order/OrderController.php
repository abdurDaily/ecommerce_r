<?php

namespace App\Http\Controllers\frontend\order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**INDEX */
    public function index()
    {
        // Fetch divisions
        $response = Http::get('https://bdapi.vercel.app/api/v.1/division');
        $divisions = $response->json('data');

        // Fetch districts
        $district_response = Http::get('https://bdapi.vercel.app/api/v.1/district');
        $districts = $district_response->json('data');

        //Fetch Upazilla
        $upazilla_response = Http::get('https://bdapi.vercel.app/api/v.1/upazilla');
        $upazillas = $upazilla_response->json('data');


        // If you want to check data, temporarily dump like:
        // dd($divisions, $districts);

        return view('frontend.order.order', compact('divisions', 'districts', 'upazillas'));
    }
}
