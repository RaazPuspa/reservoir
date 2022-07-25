<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LinkRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:255'],
            'url' => ['required', 'url'],
            'in_new_tab' => ['nullable', 'boolean'],
        ];
    }
}
