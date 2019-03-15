<?php

namespace App\Models\Vision\Traits;

/**
 * Class VisionAttribute.
 */
trait VisionAttribute
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
                '.$this->getEditButtonAttribute("edit-vision", "admin.visions.edit").'
                '.$this->getDeleteButtonAttribute("delete-vision", "admin.visions.destroy").'
                </div>';
    }
}
