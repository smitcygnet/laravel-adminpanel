<?php

namespace App\Models\Tempone\Traits;

/**
 * Class TemponeAttribute.
 */
trait TemponeAttribute
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
                '.$this->getEditButtonAttribute("edit-tempone", "admin.tempones.edit").'
                '.$this->getDeleteButtonAttribute("delete-tempone", "admin.tempones.destroy").'
                </div>';
    }
}
