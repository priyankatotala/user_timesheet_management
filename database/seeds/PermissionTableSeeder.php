<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'product-list',
           'product-create',
           'product-edit',
           'product-delete'
        ];


        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }


        $role3 = Role::create(['name' => 'super-admin']);
        $role = Role::findByName('super-admin');
$role->givePermissionTo('role-list','role-create','role-edit','role-delete','product-list','product-create','product-edit','product-delete');

        $user = Factory(App\User::class)->create([
            'name' => 'Priya1',
            'email' => 'superadmin1@example.com',
        ]);
        


        
        
        $user->assignRole('super-admin');

    }
}