<?php

namespace App\Models\Sampletwo\Traits;

/**
 * Class SampletwoAttribute.
 */
trait SampletwoAttribute
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
                '.$this->getEditButtonAttribute("edit-sampletwo", "admin.sampletwos.edit").'
                '.$this->getDeleteButtonAttribute("delete-sampletwo", "admin.sampletwos.destroy").'
                </div>';
    }
}
