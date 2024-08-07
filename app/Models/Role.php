<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as OriginalRole;

class Role extends OriginalRole
{
    use HasFactory;
    protected $fillable = [
        'name',
        'guard_name',
        'updated_at',
        'created_at',
    ];


    protected $withCount = [
        'permissions'
    ];
    protected $appends = [
        'permission_ids',
    ];
    public function getPermissionIdsAttribute()
    {
        return $this->permissions->pluck('id')->toArray();
    }
}
