<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorized()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('post')->id;

        return [
            'title' => 'required|max:255|unique:posts,title,'.$id,
            'content_md' => 'required|min:3',
        ];
    }
}
