<?php

namespace App\Http\Requests;

use App\Enums\TaskStatusEnum;
use Illuminate\Validation\Rule;

class TaskRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'status' => ['required', Rule::enum(TaskStatusEnum::class)]
        ];
    }
}
