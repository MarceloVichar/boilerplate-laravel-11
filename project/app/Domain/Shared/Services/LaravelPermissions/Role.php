<?php

namespace App\Domain\Shared\Services\LaravelPermissions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    protected $guarded = [];

}
