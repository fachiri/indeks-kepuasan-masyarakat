<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $data = Feedback::latest()->paginate(5);
        return view('pages.dashboard.feedback.index', compact('data'));
    }
}
