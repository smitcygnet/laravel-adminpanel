<?php

namespace App\Models\Modulecreator;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = ['view_permission_id', 'name', 'url', 'created_by', 'updated_by'];
}
