<?php

namespace App\Models\Samplethree\Traits;

/**
 * Class SamplethreeAttribute.
 */
trait SamplethreeAttribute
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
                '.$this->getEditButtonAttribute("edit-samplethree", "admin.samplethrees.edit").'
                '.$this->getDeleteButtonAttribute("delete-samplethree", "admin.samplethrees.destroy").'
                </div>';
    }
}
