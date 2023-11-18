<?php

namespace App\Http\Requests\CategoryRequests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    // public function rules(): array
    // {
    //     return [
    //         'tr.*'=>['require','array'],
    //         "tr.name" => ["unique:categories,name","required","string", "max:50"],

    //         'en.*'=>['require','array'],
    //         "en.name" => ["unique:categories,name","required","string", "max:50"],
    //     ];
    // }


    public function rules(): array
    {
        $data = [];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data)
    {
        foreach (config('translatable.locales') as $lang) {
            $data[$lang] = 'required|array';
            $data["$lang.name"] = "string|unique:category_translations,name,NULL,id,locale,$lang|required|max:255";
        }
        return $data;
    }
}
