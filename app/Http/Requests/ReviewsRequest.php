<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * レビュー投稿のバリエーションエラー
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:50',
            'author_name' => 'required|string|max:25',
            'category_id' => 'required|string|max:1',
            'impressions' => 'required|string|min:30',
            'image' => 'file|mimes:jpeg,png,jpg,bmb|max:2048',
        ];
    }
}
