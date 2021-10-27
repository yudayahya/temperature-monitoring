<?php

namespace App\Http\Controllers;

use App\Models\FishPool;
use App\Models\Temperature;
use Illuminate\Http\Request;

class Tabel extends Controller
{
    public function index()
    {
        $data['pools'] = FishPool::get();
        $data['title'] = "Tabel";
        return view('tabel', $data);
    }

    public function get_data($filter)
    {
        if ($filter == 'default') {
            $pool = FishPool::first();
            $data = Temperature::where('fish_pool_id', $pool->id)->with('fish_pool')->orderBy('time', 'desc')->get();
        } else {
            $data = Temperature::where('fish_pool_id', $filter)->with('fish_pool')->orderBy('time', 'desc')->get();
        }

        $output = array();
        foreach ($data as $d) {
            $row = array();
            $row[] = $d->fish_pool->name;
            $row[] = date('d-m-Y', strtotime($d->time));
            $row[] = date('H:i', strtotime($d->time));
            $row[] = $d->temperature . ' Celcius';
            $row[] = $d->ph;

            $output[] = $row;
        }

        return response()->json([
            "data" => $output,
        ]);
    }
}
