<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorized()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255|unique:posts',
            'content_md' => 'required|min:3',
        ];
    }
}
