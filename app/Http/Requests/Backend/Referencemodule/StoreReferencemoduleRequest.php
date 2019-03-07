<?php

namespace App\Http\Requests\Backend\Referencemodule;

use Illuminate\Foundation\Http\FormRequest;

class StoreReferencemoduleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-referencemodule');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'id' => 'required|max:191',
			'votes' => 'required|max:191',
			'data' => 'required|max:191',
			'confirmed' => 'required|max:191',
			'votes1' => 'required|max:191',
			'createdd_at' => 'required|max:191',
			'createddd_at' => 'required|max:191',
			'createdddd_at' => 'required|max:191',
			'positions' => 'required|max:191',
			'positions1' => 'required|max:191',
			'visitor' => 'required|max:191',
			'options' => 'required|max:191',
			'options1' => 'required|max:191',
			'positions2' => 'required|max:191',
			'description' => 'required|max:191',
			'device' => 'required|max:191',
			'id2' => 'required|max:191',
			'votes2' => 'required|max:191',
			'description2' => 'required|max:191',
			'taggable' => 'required|max:191',
			'positions3' => 'required|max:191',
			'position4' => 'required|max:191',
			'positions5' => 'required|max:191',
			'taggable2' => 'required|max:191',
			'position5' => 'required|max:191',
			'positions6' => 'required|max:191',
			'id3' => 'required|max:191',
			'votes3' => 'required|max:191',
			'description3' => 'required|max:191',
			'sunrise' => 'required|max:191',
			'sunrise2' => 'required|max:191',
			'added_on3' => 'required|max:191',
			'added_on4' => 'required|max:191',
			'id4' => 'required|max:191',
			'votes4' => 'required|max:191',
			'votes5' => 'required|max:191',
			'votes6' => 'required|max:191',
			'votes7' => 'required|max:191',
			'votes8' => 'required|max:191',
			'votes9' => 'required|max:191',
			'id5' => 'required|max:191',
			'birth_year' => 'required|max:191',
			'amount2' => 'required|max:191',
			'amount3' => 'required|max:191',
			'level' => 'required|max:191',
			'amount4' => 'required|max:191',
			'name1' => 'required|max:191',
			'amount5' => 'required|max:191',
			'name2' => 'required|max:191',
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
