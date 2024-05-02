<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Master extends Model
{
    use HasFactory, CrudTrait;
    use \App\Traits\Model;

    protected $table = 'masters';

    protected $fillable = ['active', 'first_name', 'last_name', 'occupations_id'];

//    public function occupations()
//    {
//        return $this->hasMany(Occupation::class);
//    }
    public function occupations()
    {
        return $this->belongsToMany(Occupation::class, 'master_profession', 'master_id', 'profession_id');
    }

    public function setImageAttribute($value)
    {

        if($value)
        {

            $attribute_name = "photo";

            $disk = "public";

            $destination_path = "masters";

            $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        }

    }

    public static function boot()
    {

        parent::boot();

        static::deleting(function($obj) {

            \Storage::disk('public')->delete($obj->photo);

        });



    }
}
