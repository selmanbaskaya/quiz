<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'image', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer'];
    protected $appends = ['true_percent'];

    use HasFactory;

    public function myAnswer() {
        return $this->hasOne('App\Models\Answer')->where('user_id', auth()->user()->id);
    }

    public function answers() {
        return $this->hasMany('App\Models\Answer');
    }

    public function getTruePercentAttribute() {
        $answer_count = $this->answers()->count();
        $true_answer = $this->answers()->where('answer', $this->correct_answer)->count();

        return round((100 / $answer_count) * $true_answer);
    }
}
