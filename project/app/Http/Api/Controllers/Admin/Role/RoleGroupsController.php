<?php

namespace App\Http\Api\Controllers\Admin\Role;

use App\Domain\Shared\Services\LaravelPermissions\Role;
use App\Http\Api\Resources\Admin\RoleResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class RoleGroupsController
{
    use AuthorizesRequests;

    public function __invoke(Request $request)
    {
        $group = $request->query('group');
        $name = $request->query('name');

        $roles = Role::query();

        $roles = $roles->when($group, function ($query, $group) {
            return $query->where('group', $group);
        });

        $roles = $roles->when($name, function ($query, $name) {
            return $query->where('name', 'LIKE', "%$name%");
        });

        return pagination($roles)
            ->defaultSort('-created_at')
            ->resource(RoleResource::class);
    }
}
