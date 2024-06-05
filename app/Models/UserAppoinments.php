<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAppoinments extends Model
{
    use HasFactory;

    protected $table = 'users_appointments';

    protected $fillable = [
        'active',
        'user_id',
        'service_id',
        'appointment_date',
        'service_cost',
        'service_done'
    ];

    public function users(){
        return $this->belongsTo('users');
    }

    public function service(){
        return $this->BelongsTo(Service::class, 'service_id','id');
    }

}
