<?php
namespace App\Services;

use App\Models\User;

class UserService
{
    public function getAllAdmin()
    {
        $results = User::where('level', '1')->get();
        return datatables()
        ->of($results)
        ->addIndexColumn()
        ->addColumn('actions', function($rows) {
            $rows = json_encode($rows);
            $rows = json_decode($rows);
            $url = url('admin');
            $id = $rows->id;
            $btn = "<td> <div class='btn-group'>";
            $btn .= "<a href='' class='btn btn-primary btn-sm'>Detail</a>";
            $btn .= '</div> </td>';
            return $btn;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }

    public function getAllOwner()
    {
        $results = User::where('level', '0')->get();
        return datatables()
        ->of($results)
        ->addIndexColumn()
        ->addColumn('actions', function($rows) {
            $rows = json_encode($rows);
            $rows = json_decode($rows);
            $url = url('admin');
            $id = $rows->id;
            $btn = "<td> <div class='btn-group'>";
            $btn .= "<a href='' class='btn btn-primary btn-sm'>Detail</a>";
            $btn .= '</div> </td>';
            return $btn;
        })
        ->rawColumns(['actions'])
        ->make(true);
    }
}