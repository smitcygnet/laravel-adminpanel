<?php

namespace App\Models\Life;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Life\Traits\LifeAttribute;
use App\Models\Life\Traits\LifeRelationship;

class Life extends Model
{
    use ModelTrait,
        LifeAttribute,
    	LifeRelationship {
            // LifeAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'lives';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
            'title',
			'comment',
			'dropdown',
			'explaination',
			'datethree',
			'profile_pic',
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
