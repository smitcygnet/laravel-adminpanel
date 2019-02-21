<?php

namespace App\Models\News\Traits;

/**
 * Class NewsAttribute.
 */
trait NewsAttribute
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
                '.$this->getEditButtonAttribute("edit-news", "admin.news.edit").'
                '.$this->getDeleteButtonAttribute("delete-news", "admin.news.destroy").'
                </div>';
    }
}
