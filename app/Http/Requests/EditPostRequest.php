<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' =>'required|integer',
            'area_id' => 'required|integer',
            'name' => 'required|max:100',
            'review' => 'required',
            'file' => 'required|image',
            'address' => 'required|max:100',
            'hours' => 'required|max:30',
            'tel' => 'required|max:50',
            'url' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'category_id' => 'カテゴリーフォーム',
            'area_id' =>'エリアフォーム',
            'name' => '店舗名',
            'review' => 'レビュー',
            'file' => 'アップロードファイル',
            'address' => '住所',
            'hours' => '営業時間',
            'tel' => '電話番号',
            'url' => 'URL'
        ];
    }
}
