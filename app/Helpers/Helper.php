<?php

namespace App\Helpers;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function upload($file, $path, $oldFile = '')
    {
        if (!empty($oldFile)) {
            $oldFile = explode('/', $oldFile);
            $oldFile = $oldFile[count($oldFile) - 1];
            File::delete(base_path().'/public/uploads/', $oldFile);
        }
        $imageName = time() . str_random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(base_path().'/public/uploads/', $imageName);

        return $imageName;
    }

    public static function getCategories()
    {
        return Category::pluck('name', 'id')->all();
    }
}
