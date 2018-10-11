<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder{
  public function run(){
    $role_client = 
    Role::where('name', 'client')->first();
    
    $cliente = new User();
    $cliente->name = 'Nombre Cliente';
    $cliente->email = 'cliente@ejemplo.com';
    $cliente->password = bcrypt('secret');
    $cliente->save();
    $cliente->roles()->attach($role_client);
    // Siguiente diapositiva
	$role_admin  = Role::where('name', 'admin')->first();

	$admin = new User();
	$admin->name = 'Nombre Admin';
	$admin->email = 'admin@ejemplo.com';
	$admin->password = bcrypt('secret');
	$admin->save();
	$admin->roles()->attach($role_admin);
  }
}