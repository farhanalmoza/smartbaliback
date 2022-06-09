<?php
namespace App\Services;

use App\Models\Backpacker;

class BackpackerService
{
    // get detail backpacker
    public function get($id)
    {
        $result = Backpacker::where('id', $id)->first();
        if(!$result) return response(['message' => 'Oops, terjadi kesalahan!'], 406);
        return response($result);
    }
}