<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PastaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // deve essere true
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
            'title' => 'required|max:100|min:2',
            'image' => 'required|max:255|min:10',
            'cooking_time' => 'required|max:20|min:2',
            'type' => 'required|max:20|min:2',
            'weight' => 'required|max:20|min:2',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è un campo obbligatorio',
            'title.max' => 'Il titolo deve avere al massimo :max caratteri',
            'title.min' => 'Il titolo deve avere al minimo :min caratteri',
            'image.required' => 'La URL \'immagine è un campo obbligatorio',
            'image.max' => 'La URL \'immagine  deve avere al massimo :max caratteri',
            'image.min' => 'La URL \'immagine deve avere al minimo :min caratteri',
            'cooking_time.required' => 'Il tempo di cottura è un campo obbligatorio',
            'cooking_time.max' => 'Il tempo di cottura  deve avere al massimo :max caratteri',
            'cooking_time.min' => 'Il tempo di cottura  deve avere al minimo :min caratteri',
            'type.required' => 'Il tipo è un campo obbligatorio',
            'type.max' => 'Il tipo deve avere al massimo :max caratteri',
            'type.min' => 'Il titolo deve avere al minimo :min caratteri',
            'weight.required' => 'Il peso è un campo obbligatorio',
            'weight.max' => 'Il peso deve avere al massimo :max caratteri',
            'weight.min' => 'Il peso deve avere al minimo :min caratteri',
        ];
    }
}
