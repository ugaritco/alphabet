<?php

namespace App\Http\Requests\Teams;

use App\Enums\TeamRole;
use Heritage\Contracts\Validation\ValidationRule;
use Heritage\Foundation\Http\FormRequest;
use Heritage\Validation\Rule;

class UpdateTeamMemberRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role' => ['required', 'string', Rule::in(array_column(TeamRole::assignable(), 'value'))],
        ];
    }
}
