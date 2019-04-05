<?php

namespace App\Models\Post\Traits;

/**
 * Class PostAttribute.
 */
trait PostAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-post", "admin.posts.edit").'
                '.$this->getDeleteButtonAttribute("delete-post", "admin.posts.destroy").'
                </div>';
    }
}
