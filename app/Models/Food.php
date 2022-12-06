<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    protected $table = 'foods';

    public function restaurant()
    {
        return $this->belongsTo(User::class, 'restaurant_id');
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "food_images";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $fileName = null);
    }
}
