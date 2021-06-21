<?php

namespace Database\Seeders;

use App\Models\Administrador;
use App\Models\Banco;
use App\Models\Categoria;
use App\Models\Cuenta;
use App\Models\Integrante;
use App\Models\Propietario;
use App\Models\Proveedor;
use App\Models\Servicio;
use App\Models\TipoUnidad;
use App\Models\TipoUsuario;
use App\Models\Unidad;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		// \App\Models\User::factory(10)->create();

		User::create([
			'name' => 'Diego A. Rodríguez',
			'email' => 'diegordgz8@outlook.com',
			'email_verified_at' => now(),
			'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
			'remember_token' => Str::random(10),
		]);

		Banco::factory(15)->create();
		Categoria::factory(20)->create();
		TipoUnidad::factory(5)->create();
		TipoUsuario::factory(5)->create();

		Cuenta::factory(4)->create();

		Propietario::factory(20)->create();
		Integrante::factory(50)->create();
		Administrador::factory(8)->create();

		Servicio::factory(15)
			->has(Proveedor::factory()->count(3), 'proveedores')
			->count(10)
			->create();

		Unidad::factory(20)->create();
	}
}
