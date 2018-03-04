<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollectFormPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'required|unique:posts|max:255',
            'last_name' => 'required|unique:posts|max:255',
            'gender' => 'required|unique:posts|max:255',
            'birth' => 'required|unique:posts|max:255',
            'thai_id' => 'required|unique:posts|max:255',
        ];
    }
}
