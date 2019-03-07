<?php

namespace App\Http\Requests\Backend\Testmthree;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestmthreeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-testmthree');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'first_name' => 'required|max:191',
			'last_name' => 'max:191',
			'age' => 'required|max:191',
			'comment' => 'max:191',
			'dropdown' => 'required|max:191',
			'explaination' => 'required|max:191',
			'gender' => 'required|max:191',
			'associated_roles' => 'required|max:191',
			'dataone' => 'max:191',
			'datetwo' => 'required|max:191',
			'datethree' => 'max:191',
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
