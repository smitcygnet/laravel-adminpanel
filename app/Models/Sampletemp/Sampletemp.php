<?php

namespace App\Models\Sampletemp;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sampletemp\Traits\SampletempAttribute;
use App\Models\Sampletemp\Traits\SampletempRelationship;

class Sampletemp extends Model
{
    use ModelTrait,
        SampletempAttribute,
    	SampletempRelationship {
            // SampletempAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'sampletemps';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
            'first_name',
			'last_name',
			'age',
			'comment',
			'dropdown',
			'explaination',
			'gender',
			'associated_roles',
			'dataone',
			'datetwo',
			'datethree',
			'profile_pic',
			'profile_img',
    ];

    /**
     * Default values for model fields
     * @var array
     */
    protected $attributes = [

    ];

    /**
     * Dates
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * Guarded fields of model
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * Constructor of Model
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
}
