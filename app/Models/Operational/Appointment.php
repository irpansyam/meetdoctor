<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    //use HasFactory;
    use SoftDeletes;


    public $table = 'appointment';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'doctor_id',
        'user_id',
        'consultation_id',
        'level',
        'date',
        'time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\user', 'user_id', 'id');
    }

    public function transaction()
    {
        return $this->hasOne('App\Models\Operational\Transaction', 'appointmentr_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Operational\Doctor', 'doctor_id');
    }

    public function consultation()
    {
        return $this->hasOne('App\Models\MasterData\Consultation', 'consultation_id');
    }
}
