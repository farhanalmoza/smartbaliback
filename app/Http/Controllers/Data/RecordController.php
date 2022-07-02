<?php

namespace App\Http\Controllers\Data;

use App\Http\Controllers\Controller;
use App\Services\RecordService;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    protected $record;

    public function __construct()
    {
        $this->record = app()->make(RecordService::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $tourist_attraction = $request->input('tmpWisata');
        $hotel              = $request->input('hotel');
        $accom              = $request->input('akomodasi');

        $data = [
            'backpacker_id' => $request->input('backpacker_id'),
            'no_hp'         => $request->input('no_hp'),
            'arrival'       => $request->input('tmpDatang'),
            'check_in'      => $request->input('tglDatang'),
            'check_out'     => $request->input('tglPergi'),
        ];

        return $this->record->add($data, $tourist_attraction, $hotel, $accom);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->record->get($id);
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
