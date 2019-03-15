<?php

namespace App\Models\Samplesix\Traits;

/**
 * Class SamplesixAttribute.
 */
trait SamplesixAttribute
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
                '.$this->getEditButtonAttribute("edit-samplesix", "admin.samplesixes.edit").'
                '.$this->getDeleteButtonAttribute("delete-samplesix", "admin.samplesixes.destroy").'
                </div>';
    }
}
