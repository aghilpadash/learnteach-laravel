<?php

namespace Aghil\Category\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Created and Developed by Aghil Padash
 **/
class Category extends Model
{
    protected $guarded = [];

    public function getParentAttribute()
    {
        return (!$this->parent_id) ? 'ندارد' : $this->parentCategory->title;
    }

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}