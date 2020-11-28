<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name'          => 'required|string|regex:/^(\w.+\s).+$/||max:255',
            'image'         => 'nullable|image|max:' . 1024, 'dimensions:ratio:3/2',
            'mobile_number' => ['required', 'string', 'regex:/^01[0-9]{9}/', Rule::unique('users')->ignore($this->user->id)],
            'password'      => 'nullable|string|confirmed|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])$/',
        ];
    }
}
