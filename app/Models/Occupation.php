<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use CrudTrait;
    use HasFactory;
    use \App\Traits\Model;

    protected $fillable = ['active', 'title', 'description'];

    public function masters()
    {
        return $this->belongsToMany(Master::class, 'master_profession', 'profession_id', 'master_id');
    }
}
