<?php

namespace App\Models\Sampleseven\Traits;

/**
 * Class SamplesevenAttribute.
 */
trait SamplesevenAttribute
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
                '.$this->getEditButtonAttribute("edit-sampleseven", "admin.samplesevens.edit").'
                '.$this->getDeleteButtonAttribute("delete-sampleseven", "admin.samplesevens.destroy").'
                </div>';
    }
}
