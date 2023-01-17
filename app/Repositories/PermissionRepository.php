<?php
namespace App\Repositories;
use App\Repositories\Interfaces\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository implements PermissionRepositoryInterface{

    public function allPermissions()
    {

        return Permission::all();

    }

    public function storePermission($data)
    {
        return Permission::create(['name' => $data['name'], 'group_name' => $data['group_name'], 'guard_name' => 'admin']);
    }

    public function findPermission($id)
    {
        return Permission::findById($id,'admin');
    }

    public function updatePermission($data, $id)
    {

        $permission = Permission::where('id', $id)->first();
        
        $permission->update([
            'name' => $data['name'],
            'guard_name' => 'admin',
            'group_name' => $data['group_name'],
        ]);

    }

    public function destroyPermission($id)
    {
       $permission =  Permission::findById($id,'admin');
       if(!is_null($permission)){
        $permission->delete();
       }

    }

}
