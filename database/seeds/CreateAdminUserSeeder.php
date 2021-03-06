<?php
  
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
//php artisan db:seed --class=CreateAdminUserSeeder
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Adelino Masioli', 
        	'email' => 'adelinomasioli@gmail.com',
        	'password' => bcrypt('123456')
        ]);
  
        $role = Role::create(['name' => 'Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}