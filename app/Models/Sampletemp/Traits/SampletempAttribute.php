<?php

namespace App\Models\Sampletemp\Traits;

/**
 * Class SampletempAttribute.
 */
trait SampletempAttribute
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
                '.$this->getEditButtonAttribute("edit-sampletemp", "admin.sampletemps.edit").'
                '.$this->getDeleteButtonAttribute("delete-sampletemp", "admin.sampletemps.destroy").'
                </div>';
    }
}
