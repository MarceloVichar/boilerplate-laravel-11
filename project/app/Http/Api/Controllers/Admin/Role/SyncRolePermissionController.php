<?php

namespace App\Http\Api\Controllers\Admin\Role;

use App\Domain\Role\Actions\SyncRolePermissionsAction;
use App\Domain\Shared\Services\LaravelPermissions\Permission;
use App\Domain\Shared\Services\LaravelPermissions\Role;
use App\Http\Api\Requests\Admin\RolePermissionRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SyncRolePermissionController
{
    use AuthorizesRequests;

    public function __invoke(RolePermissionRequest $request, Role $role)
    {
        $this->authorize('syncPermissions', Permission::class);

        $data = $request->validated();

        app(SyncRolePermissionsAction::class)
            ->execute($data['permissionIds'], $role);
    }
}
