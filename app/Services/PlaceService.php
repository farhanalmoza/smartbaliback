<?php
namespace App\Services;

use App\Models\Place;

class PlaceService
{
    public function getTours()
    {
        $results = Place::where('type', 'tour')->get();
        return datatables()->of($results)->make(true);
    }
}