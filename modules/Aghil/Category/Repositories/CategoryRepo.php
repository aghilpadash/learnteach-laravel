<?php

namespace Aghil\Category\Repositories;

use Aghil\Category\Models\Category;

/**
 * Created and Developed by Aghil Padash
 **/
class CategoryRepo
{
    public function all()
    {
        return Category::all();
    }

    public function store($values)
    {
        return Category::create([
            'title' => $values->title,
            'slug' => $values->slug,
            'parent_id' => $values->parent_id,
        ]);
    }

    public function findById($id)
    {
        return Category::find($id);
    }

    public function allExceptByIds($id)
    {
        return $this->all()->filter(function ($item) use ($id) {
            return $item->id != $id;
        });
    }

    public function update($id, $values)
    {
        Category::where('id', $id)->update([
            'title' => $values->title,
            'slug' => $values->slug,
            'parent_id' => $values->parent_id,
        ]);
    }

    public function delete($id)
    {
        Category::where('id', $id)->delete();
    }
}