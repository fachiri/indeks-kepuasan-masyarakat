<?php

namespace App\Http\Controllers;

use App\Models\Responden;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RespondenController extends Controller
{
    public function index(): View
    {
        $respondens = Responden::latest()->paginate(5);

        return view('pages.dashboard.responden.index', compact('respondens'));
    }

    public function show(Responden $responden)
    {
        return view('pages.dashboard.responden.show', compact('responden'));
    }
}
