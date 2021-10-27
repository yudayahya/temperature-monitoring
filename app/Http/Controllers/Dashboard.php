<?php

namespace App\Http\Controllers;

use App\Models\FishPool;
use App\Models\Temperature;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data['pools'] = FishPool::get();
        $data['title'] = 'Dashboard';
        return view('dashboard', $data);
    }

    public function chart_data()
    {
        $pools = FishPool::get();
        $labels = array();
        $suhu_datasets = array();
        $ph_datasets = array();
        foreach ($pools as $index => $pool) {
            $temperature = array();
            $ph = array();
            $rows = Temperature::where('fish_pool_id', $pool->id)->orderBy('time', 'desc')->limit(10)->get()->reverse()->values();
            foreach ($rows as $row) {
                $temperature[] = $row->temperature;
                $ph[] = $row->ph;

                if ($index == 0) {
                    $labels[] = date("H:i", strtotime($row->time));
                }
            }

            $suhu_dataset = [
                "label" => $pool->name,
                "lineTension" => 0.3,
                "backgroundColor" => "transparent",
                "borderColor" => $pool->color,
                "pointRadius" => 3,
                "pointBackgroundColor" => $pool->color,
                "pointBorderColor" => $pool->color,
                "pointHoverRadius" => 3,
                "pointHoverBackgroundColor" => $pool->color,
                "pointHoverBorderColor" => $pool->color,
                "pointHitRadius" => 10,
                "pointBorderWidth" => 2,
                "data" => $temperature,
            ];

            $ph_dataset = [
                "label" => $pool->name,
                "lineTension" => 0.3,
                "backgroundColor" => "transparent",
                "borderColor" => $pool->color,
                "pointRadius" => 3,
                "pointBackgroundColor" => $pool->color,
                "pointBorderColor" => $pool->color,
                "pointHoverRadius" => 3,
                "pointHoverBackgroundColor" => $pool->color,
                "pointHoverBorderColor" => $pool->color,
                "pointHitRadius" => 10,
                "pointBorderWidth" => 2,
                "data" => $ph,
            ];

            $suhu_datasets[] = $suhu_dataset;
            $ph_datasets[] = $ph_dataset;
        }
        return response()->json([
            "labels" => $labels,
            "suhu_datasets" => $suhu_datasets,
            "ph_datasets" => $ph_datasets,
        ]);
    }
}
