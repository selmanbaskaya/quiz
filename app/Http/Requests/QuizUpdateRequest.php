<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'required|min:10|max:150',
            'description'=>'required|min:30|max:500',
            'finished_at'=>'nullable|after:'.now(),
        ];
    }


    public function attributes()
    {
        return [
            'title'=>"'Quiz Title'",
            'description'=>"'Quiz Description'",
            'finished_at'=>"'Due Date'",
        ];
    }
}
