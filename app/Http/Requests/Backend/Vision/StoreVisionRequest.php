<?php

namespace App\Http\Requests\Backend\Vision;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-vision');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'vision_name' => 'required|max:191',
			'since' => 'required|max:191',
			'notes' => 'max:191',
			'company' => 'required|max:191',
			'associated_roles' => 'required|max:191',
			'dateone' => 'max:191',
            //Put your rules for the request in here
            //For Example : 'title' => 'required'
            //Further, see the documentation : https://laravel.com/docs/5.4/validation#creating-form-requests
        ];
    }

    public function messages()
    {
        return [
            //The Custom messages would go in here
            //For Example : 'title.required' => 'You need to fill in the title field.'
            //Further, see the documentation : https://laravel.com/docs/5.4/validation#customizing-the-error-messages
        ];
    }
}
