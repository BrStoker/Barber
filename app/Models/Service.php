<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['name', 'image', 'preview', 'description', 'cost'];

    public function setImageAttribute($value)
    {

        if($value)
        {

            $attribute_name = "image";

            $disk = "public";

            $destination_path = "images";

            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        }

    }
}
