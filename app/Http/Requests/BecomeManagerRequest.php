<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @bodyParam team_id int required The id of the team. Example: 1
 */
class BecomeManagerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check() && ! auth()->user()->isManagerOfATeam();
    }

    protected function failedAuthorization()
    {
        if (auth()->check() && auth()->user()->isManagerOfATeam()) {
            abort(403, __('You are already the manager of a team'));
        } elseif (!auth()->check()) {
            abort(403, __('You must be logged in to become a manager'));
        }

        abort(403, __('You are not authorized to become a manager'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'team_id' => 'required|integer|exists:teams,id',
        ];
    }
}
