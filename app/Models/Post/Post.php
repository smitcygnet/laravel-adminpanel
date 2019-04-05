<?php

namespace App\Models\Post;

use App\Models\ModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post\Traits\PostAttribute;
use App\Models\Post\Traits\PostRelationship;

class Post extends Model
{
    use ModelTrait,
        PostAttribute,
    	PostRelationship {
            // PostAttribute::getEditButtonAttribute insteadof ModelTrait;
        }

    /**
     * NOTE : If you want to implement Soft Deletes in this model,
     * then follow the steps here : https://laravel.com/docs/5.4/eloquent#soft-deleting
     */

    /**
     * The database table used by the model.
     * @var string
     */
    protected $table = 'posts';

    /**
     * Mass Assignable fields of model
     * @var array
     */
    protected $fillable = [
            'title',
			'name',
			'comment',
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
