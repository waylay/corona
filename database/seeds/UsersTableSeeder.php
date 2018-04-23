<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\User::class)->create(array(
			'name' => 'admin',
			'email' => 'troy@eramedia.ca',
			'password' => bcrypt('{9F#K$vLwJaG'),
		));
	}
}
