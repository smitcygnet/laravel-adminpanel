<?php

namespace App\Models\Samplefive\Traits;

/**
 * Class SamplefiveAttribute.
 */
trait SamplefiveAttribute
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
                '.$this->getEditButtonAttribute("edit-samplefive", "admin.samplefives.edit").'
                '.$this->getDeleteButtonAttribute("delete-samplefive", "admin.samplefives.destroy").'
                </div>';
    }
}
