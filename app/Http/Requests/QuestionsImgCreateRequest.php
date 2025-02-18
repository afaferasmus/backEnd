<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsImgCreateRequest extends FormRequest
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

    public function rules()
    {
        return [
            'question' => 'required|string',
            'correct' => 'required|numeric|between:0,1',
            'realNew' => 'required|string',
            'img' => 'nullable|string|max:255',
            
        ];
    }

    public function attributes()
    {
        return [
            'question' => 'the real or fake notice',
            'correct' => 'if is real the notice',
            'realNew' => 'the real notices or explication',
            'img' => 'the image of notice'
        ];
    }
    
    
    public function messages()
    {
    
             return [
        'question.required' => 'The  :attribute is required',
        'question.string' => 'The  :attribute must be string',
        'correct.required' => 'The  :attribute is required',
        'correct.numeric' => 'The  :attribute must be a numerci',
        'correct.between' => 'The  :attribute must be between :min and :max ',
       'realNew.required' => 'The  :attribute is required',
        'realNew.string' => 'The  :attribute must be string',
        'img.string' => 'The  :attribute must be string',
        'img.string' => 'The  :attribute must be less than 250 characters'
    
        ];
    }
}
