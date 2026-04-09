<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckHandler;
use Illuminate\Validation\Rule;

    /**
     * @property-read UploadedFile $photo
     */


class ProfileRequest extends FormRequest
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
            'name' => ['required', 'min:3','max:50',],
            'description' => ['nullable'],
            'photo' => ['nullable','image',],
            'handler' => ['required', Rule::unique('users')->ignoreModel($this->user()), new CheckHandler()],
        ];
    }
}
