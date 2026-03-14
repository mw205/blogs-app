<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|min:3|unique:posts,title|max:255",
            "description" => "required|string|min:10",
            "user_id" => "required|exists:users,id"
        ];
    }
    public function messages(): array
    {
        return [
            "title.unique" => "This title should be unique",
            "title.min" => "Minimum length of title is 3 characters",
            "user_id.exists" => "This user doesn't exist in our data"
        ];
    }
}
