<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $post = $this->route('post');

        return [
            "title" => [
                "required",
                "string",
                "min:3",
                "max:255",
                Rule::unique('posts')->ignore($post->id),
            ],
            "description" => "required|string|min:10",
            "user_id" => "required|exists:users,id",
            "post_image" => "nullable|file|mimes:jpg,jpeg,png|max:5000"
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
