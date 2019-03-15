<?php

namespace App\Models\Samplesevennew\Traits;

/**
 * Class SamplesevennewAttribute.
 */
trait SamplesevennewAttribute
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
                '.$this->getEditButtonAttribute("edit-samplesevennew", "admin.samplesevennews.edit").'
                '.$this->getDeleteButtonAttribute("delete-samplesevennew", "admin.samplesevennews.destroy").'
                </div>';
    }
}
