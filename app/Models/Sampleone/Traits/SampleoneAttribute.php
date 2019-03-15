<?php

namespace App\Models\Sampleone\Traits;

/**
 * Class SampleoneAttribute.
 */
trait SampleoneAttribute
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
                '.$this->getEditButtonAttribute("edit-sampleone", "admin.sampleones.edit").'
                '.$this->getDeleteButtonAttribute("delete-sampleone", "admin.sampleones.destroy").'
                </div>';
    }
}
