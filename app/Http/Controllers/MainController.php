<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class MainController extends Controller
{
    public function dashboard() {
        $quizzes = Quiz::where('status', 'published')->withCount('questions')->paginate(5);
        
        return view('dashboard', compact('quizzes'));
    }

    public function quiz($slug) {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();

        return view('quiz', compact('quiz'));
    }

    public function quizDetail($slug) {
        $quiz = Quiz::whereSlug($slug)->first() ?? abort(404, 'Quiz Not Found!');

        return view('quiz-detail', compact('quiz'));
    }
}
