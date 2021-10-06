<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\CarService;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $car;

    public function __construct()
    {
        $this->car = app()->make(CarService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->car->getCars();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'user_id'               => $request->input('user_id'),
            'no_car'                => $request->input('nopol'),
            'name'                  => $request->input('namaMobil'),
            'status'                => 'no rent',
            'year_production'       => $request->input('tahun'),
            'rent_price'            => $request->input('hargaRent'),
            'purchase_price'        => $request->input('hargaBeli'),
            'fuel_capacity'         => $request->input('bbm'),
            'passenger_capacity'    => $request->input('penumpang'),
        ];
        
        return $this->car->add($data);
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

    // get new car
    public function newCar($id)
    {
        return $this->car->getNewCar($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
