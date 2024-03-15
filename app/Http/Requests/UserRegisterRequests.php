<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Validation\Validator;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['Required', 'max:100'],
            'password' => ['Required', 'max:100'],
            'name' => ['Required', 'max:200'],

            
        ];
    }
    protected function failedValid(Validator $validator) 

    {
        throw new HttpResponseException(response([
            "errors" => $validator ->getMassageBag()
        ],  400));
    }
}