<?php

namespace App\Models\Vision;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vision\Traits\VisionAttribute;
use App\Models\Vision\Traits\VisionRelationship;

class Vision extends Model
{
    use ModelTrait,
        VisionAttribute,
    	VisionRelationship {
            // VisionAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'visions';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
            'vision_name',
			'since',
			'notes',
			'company',
			'associated_roles',
			'dateone',
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
