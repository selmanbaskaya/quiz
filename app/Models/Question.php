<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['question', 'image', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer'];

    use HasFactory;

    public function myAnswer() {
        return $this->hasOne('App\Models\Answer')->where('user_id', auth()->user()->id);
    }
}
