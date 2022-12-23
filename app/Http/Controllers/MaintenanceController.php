<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::with(['user', 'vehicle'])
            ->where('user_id', Auth::user()->id)->get();

        $vehicles = Vehicle::with(['brand', 'vehicleType'])->get();
        
        // return response()->json(['data'=> $maintenance, 'vehicle' => $vehicle])
        // return dd($maintenances);

        $dateNow = Carbon::now();

        // return dd($maintenances);

        return Inertia::render('Maintenance/Index', [
            'maintenances' => $maintenances,
            'vehicles' => $vehicles
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return
        // return dd($vehicles = Vehicle::with('maintenance')->where('id', 'vehicle_id')->toSql());

        $vehicles = Vehicle::with([
            'user',
            'brand', 
            'vehicleType'
        ])->where('user_id', Auth::user()->id)->get(); 


        return Inertia::render('Maintenance/Create', [
            'vehicles' => $vehicles,
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
            'description' => 'required|string|max:255',
            'vehicle_id' => 'required|integer',
            'user_id' => 'required|integer',
            'date' => 'required|date',
        ], customAttributes: [
            'description' => 'descrição',
            'vehicle_id' => 'veículo',
            'user_id' => 'usuário',
            'date' => 'data',
        ]);

        Maintenance::create($validated);

        return redirect(route('maintenances.index'))->with('message', 'success');
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
        $maintenance = Maintenance::findOrFail($id);

        $vehicles = Vehicle::with('user')->where('user_id', Auth::user()->id)->get(); 

        // return dd($maintenance);

        return Inertia::render('Maintenance/Edit', [            
            'vehicles' => $vehicles,
            'maintenance' => $maintenance,
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
            'description' => 'required|string|max:255',
            'vehicle_id' => 'required|integer',
            'user_id' => 'required|integer',
            'date' => 'required|date',
        ], customAttributes: [
            'description' => 'descrição',
            'vehicle_id' => 'veículo',
            'user_id' => 'usuário',
            'date' => 'data',
        ]);

        $maintenance = Maintenance::findOrFail($id);
        $maintenance->update($validated);
        
        return redirect(route('maintenances.index'))->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->delete();
    }
}
