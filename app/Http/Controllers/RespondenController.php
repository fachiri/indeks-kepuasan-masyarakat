<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RespondenController extends Controller
{
    public function index(Request $request): View
    {
        $query = Responden::query();

        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($subquery) use ($searchTerm) {
                $subquery->where('name', 'like', "%$searchTerm%")
                    ->orWhere('gender', 'like', "%$searchTerm%")
                    ->orWhere('age', 'like', "%$searchTerm%")
                    ->orWhere('education', 'like', "%$searchTerm%")
                    ->orWhere('job', 'like', "%$searchTerm%")
                    ->orWhere('village', 'like', "%$searchTerm%");
            });
        }

        if ($request->has('filter') && $request->has('filter_by')) {
            $query->where($request->filter_by, $request->filter);
        }

        $respondens = $query->latest()->paginate($request->per_page ?? 5);

        return view('pages.dashboard.responden.index', compact('respondens'));
    }

    public function show(Responden $responden)
    {
        return view('pages.dashboard.responden.show', compact('responden'));
    }
}
