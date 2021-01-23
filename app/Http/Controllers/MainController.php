<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

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
        $quiz = Quiz::whereSlug($slug)->with('myResult', 'topTenUser.user')->withCount('questions')->first() ?? abort(404, 'Quiz Not Found!');

        return view('quiz-detail', compact('quiz'));
    }

    public function result(Request $request, $slug) {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Quiz doesnt exist');
        $correct_point = 0;
        $wrong_point = 0;
        $point = 0;

        if ($quiz->myResult) {
            abort(404, 'You have participated before!');
        }

        foreach($quiz->questions as $question) {
           Answer::create([
                'user_id'=>auth()->user()->id,
                'question_id'=>$question->id,
                'answer'=>$request->post($question->id)
            ]);

            if($question->correct_answer === $request->post($question->id)) {
                $correct_point += 1;
            }
        }

        $point = round((100 / count($quiz->questions)) * $correct_point);
        $wrong_point = count($quiz->questions) - $correct_point;
        Result::create([
            'user_id'=>auth()->user()->id,
            'quiz_id'=>$quiz->id,
            'point'=>$point,
            'correct_answer'=>$correct_point,
            'wrong_answer'=>$wrong_point
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->withSuccess("You've completed the quiz, your score is: " . $point);
    }
}
