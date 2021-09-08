<?php

namespace Database\Seeders;

use App\Models\Banco;
use Illuminate\Database\Seeder;

class BancoSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		foreach ([
			'Banco de Venezuela',
			'Banco Bicentenario',
			'Banco Mercantil',
			'Banco Exterior',
			'Banco del Tesoro',
			'Banco Provincial',
			'Banesco',
			'Bancaribe',
			'Banco Nacional de Crédito',
			'Bancamiga',
		] as $nombre) {
			Banco::create([
				'nombre' => $nombre,
			]);
		}
	}
}
