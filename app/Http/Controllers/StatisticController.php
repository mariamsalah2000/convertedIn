<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Statistic;
use Illuminate\Http\Request;
use App\Jobs\UpdateStatistics;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        $statistics = Statistic::orderBy('tasks_no', 'desc');

        if($request->search)
        {
            $search = $request->search;
            $statistics = $statistics->whereHas('user', function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%');
            });
        }
        $statistics = $statistics->paginate(10);
        return view('statistics.index', compact('statistics'));

    }
    public function update(Request $request)
    {
        UpdateStatistics::dispatch();
    }
}
