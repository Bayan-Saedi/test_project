<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * failed validation.
     *
     * @param Validator $validator Validator.
     *
     * @return void
     * @throws HttpResponseException Http Response Exception.
     */
    protected function failedValidation(Validator $validator)
    {
        $error = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json(
                [
                    'success' => false,
                    'error' => $error
                ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
