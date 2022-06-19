<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    //use HasFactory;
    use SoftDeletes;


    public $table = 'doctor';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'specialist_id',
        'user_id',
        'name',
        'fee',
        'photo',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }

    public function specialist()
    {
        return $this->hasOne('App\Models\MasterData\Specialist', 'specialist_id');
    }

    public function appointment()
    {
        return $this->belongsTo('App\Models\Operational\Appointment', 'doctor_id');
    }
}