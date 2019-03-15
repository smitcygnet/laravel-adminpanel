<?php

namespace App\Models\Life\Traits;

/**
 * Class LifeAttribute.
 */
trait LifeAttribute
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
                '.$this->getEditButtonAttribute("edit-life", "admin.lives.edit").'
                '.$this->getDeleteButtonAttribute("delete-life", "admin.lives.destroy").'
                </div>';
    }
}
