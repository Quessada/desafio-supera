<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return dd(Auth::user()->id);
        $vehicles = Vehicle::with([
            'user',
            'brand', 
            'vehicleType'
        ])->where('user_id', Auth::user()->id)->get(); 

        // return dd($vehicles);
        return Inertia::render('Vehicles/Index', [
            'vehicles' => $vehicles,
        ]); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Vehicles/Create', [            
            'vehicle_types' => VehicleType::all(),
            'vehicle_brands' => Brand::orderBy('name')->get(),
            'user' => Auth::user(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(rules: [
            'model' => 'required|string|max:255',
            'version' => 'required|max:255',
            'plate' => 'required|string|max:9',
            'brand_id' => 'required|integer',
            'type_id' => 'required|integer',
            'user_id' => 'required|integer',
            'year' => 'required|string|max:9',
        ], customAttributes: [
            'model' => 'modelo',
            'version' => 'versão',
            'plate' => 'placa',
            'brand_id' => 'marca',
            'type_id' => 'tipo do veículo',
            'user_id' => 'usuário',
            'year' => 'ano',
        ]);

        Vehicle::create($validated);

        return redirect(route('vehicles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        
        return Inertia::render('Vehicles/Edit', [            
            'vehicle' => $vehicle,
            'vehicle_types' => VehicleType::all(),
            'vehicle_brands' => Brand::orderBy('name')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate(rules: [
            'model' => 'required|string|max:255',
            'version' => 'required|max:255',
            'plate' => 'required|string|max:9',
            'brand_id' => 'required|integer',
            'type_id' => 'required|integer',
            'user_id' => 'required|integer',
            'year' => 'required|string|max:9',
        ], customAttributes: [
            'model' => 'modelo',
            'version' => 'versão',
            'plate' => 'placa',
            'brand_id' => 'marca',
            'type_id' => 'tipo do veículo',
            'user_id' => 'usuário',
            'year' => 'ano',
        ]);

        $vehicle = Vehicle::findOrFail($id);
        $vehicle->update($validated);

        return redirect(route('vehicles.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
    }
}
