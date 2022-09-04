<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|integer|exists:tags,id',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо заполнить',
            'content.required' => 'Пост не может быть без контента',
            'tags.required' => 'Теги необходимо выбрать',
            'tags.exists' => 'Тег не найден в базе',
            'category_id.required' => 'Категорию необходимо выбрать',
            'category_id.exists' => 'Категория не найдена в базе',
            'preview_image.required' => 'Файл необходимо выбрать',
            'main_image.required' => 'Файл необходимо выбрать',
        ];
    }
}
