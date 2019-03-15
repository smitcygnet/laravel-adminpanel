<?php

namespace App\Models\Temptwo\Traits;

/**
 * Class TemptwoAttribute.
 */
trait TemptwoAttribute
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
                '.$this->getEditButtonAttribute("edit-temptwo", "admin.temptwos.edit").'
                '.$this->getDeleteButtonAttribute("delete-temptwo", "admin.temptwos.destroy").'
                </div>';
    }
}
