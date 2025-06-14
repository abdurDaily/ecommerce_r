<?php
namespace App\Http\Controllers\backend\permission;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('backend.permission.assignPermission', compact('users', 'permissions'));
    }

    public function assignPermission(Request $request)
    {
        foreach ($request->users as $userId => $perms) {
            $user = User::find($userId);
            if ($user) {
                $user->syncPermissions($perms); // remove old, assign new
            }
        }

        return back()->with('success', 'Permissions updated successfully!');
    }
}
