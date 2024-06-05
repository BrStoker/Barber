<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Storage;

class Master extends Model
{
    use HasFactory, CrudTrait;
    use \App\Traits\Model;

    protected $table = 'masters';

    protected $fillable = ['active', 'first_name', 'last_name', 'occupations_id'];

    public function occupations()
    {
        return $this->belongsToMany(Occupation::class, 'master_profession', 'master_id', 'profession_id');
    }

    public function getAllOccupations(){

        return \App\Models\Occupation::all()->pluck('id', 'title');

    }

    public function getOcupations(){
        $occupation = \App\Models\Occupation::find($this->occupations_id)->first();
        if($occupation){
            return $occupation->title;
        }else{
            return 'Профессия не установлена';
        }



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

            Storage::disk('public')->delete($obj->photo);

        });



    }
}
