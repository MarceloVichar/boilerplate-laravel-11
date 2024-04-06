<?php

namespace App\Domain\Role\Actions;

use App\Domain\Shared\Services\LaravelPermissions\Role;

class DeleteRoleAction
{
    public function execute(Role $role): bool
    {
        if (!!$role->permissions()->count()) {
            $role->permissions()->detach();
        };

        return $role->delete();
    }
}
