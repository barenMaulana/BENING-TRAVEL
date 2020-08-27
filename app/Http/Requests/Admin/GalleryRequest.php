<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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
            // travel_packages merupakan relasi yang sudah di buat pada model gallery
            'travel_packages_id' => 'required|integer|exists:travel_packages,id',
            // apabila kita menggunakan image / atau sebuah gambar, maka kita dapat mengunakan required | image untuk mengurus gambar
            'image' => 'required|image'
        ];
    }
}
