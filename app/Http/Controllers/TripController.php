<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create()
    {
        return view('trips.create');
       

    }

    public function store(Request $request)
    {
        $name = $request->name;
        $age = $request->age;
        $destination = $request->destination;

        $array = [];
        $validated = $request->validate([
            'name' => 'required|alpha',
            'age' => 'required|numeric',
            'destination' => 'required|in:france,spain',
        ]);


        
        array_push($array,$name,$age,$destination);
        dd($array);


        
    }
}
