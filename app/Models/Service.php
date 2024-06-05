<?php

namespace App\Models;

use App\Http\Controllers\UserAppointments;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function userAppointments(): HasMany
    {
        return $this->hasMany(UserAppointments::class);
    }
}
