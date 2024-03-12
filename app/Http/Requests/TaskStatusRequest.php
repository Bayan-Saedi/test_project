<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use Illuminate\Validation\Rule;

class TaskStatusRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::enum(TaskStatusEnum::class)]
        ];
    }
}
