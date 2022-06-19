<?php

namespace App\Models\ManajementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    //use HasFactory;
    use SoftDeletes;


    public $table = 'permission_role';

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
    ];

    protected $fillable = [
        'permission_id',
        'role_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // one to many
    public function role()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }

    public function permission()
    {
        return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
    }
}