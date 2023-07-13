<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Providers\Purifier;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this['biography']) {
            $this->merge([
                'biography' => Purifier::clean($this->biography),
            ]);
        }
    }
}
