<?php

namespace App\Models\Comment\Traits;

/**
 * Class CommentAttribute.
 */
trait CommentAttribute
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
                '.$this->getEditButtonAttribute("edit-comment", "admin.comments.edit").'
                '.$this->getDeleteButtonAttribute("delete-comment", "admin.comments.destroy").'
                </div>';
    }
}
