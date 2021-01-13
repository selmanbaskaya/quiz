<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
            'question'=>'required|min:3',
            'image'=>'image|nullable|max:2048|mimes:jpg,jpeg,png',
            'answer_1'=>'required|min:1',
            'answer_2'=>'required|min:1',
            'answer_3'=>'required|min:1',
            'answer_4'=>'required|min:1',
            'correct_answer'=>'required',
        ];
    }

    public function attributes()
    {
        return [
            'question'=>'Question',
            'image'=>'Image',
            'answer_1'=>'1. Asnwer',
            'answer_2'=>'2. Asnwer',
            'answer_3'=>'3. Asnwer',
            'answer_4'=>'4. Asnwer',
            'correct_answer'=>'Correct Answer',
        ];
    }
}
