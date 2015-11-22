<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role, App\Models\User, App\Models\Contact, App\Models\Post, App\Models\Tag, App\Models\PostTag, App\Models\Comment;
use App\Services\LoremIpsumGenerator;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$lipsum = new LoremIpsumGenerator;

		Role::create([
			'title' => 'Administrator',
			'slug' => 'admin'
		]);

		Role::create([
			'title' => 'Redactor',
			'slug' => 'redac'
		]);

		Role::create([
			'title' => 'User',
			'slug' => 'user'
		]);

		User::create([
			'username' => 'GreatAdmin',
			'email' => 'admin@la.fr',
			'password' => bcrypt('admin'),
			'seen' => true,
			'role_id' => 1,
			'confirmed' => true
		]);

		User::create([
			'username' => 'GreatRedactor',
			'email' => 'redac@la.fr',
			'password' => bcrypt('redac'),
			'seen' => true,
			'role_id' => 2,
			'valid' => true,
			'confirmed' => true
		]);

		User::create([
			'username' => 'Walker',
			'email' => 'walker@la.fr',
			'password' => bcrypt('walker'),
			'role_id' => 3,
			'confirmed' => true
		]);

		User::create([
			'username' => 'Slacker',
			'email' => 'slacker@la.fr',
			'password' => bcrypt('slacker'),
			'role_id' => 3,
			'confirmed' => true
		]);

		Contact::create([
			'name' => 'Dupont',
			'email' => 'dupont@la.fr',
			'text' => 'Lorem ipsum inceptos malesuada leo fusce tortor sociosqu semper, facilisis semper class tempus faucibus tristique duis eros, cubilia quisque habitasse aliquam fringilla orci non. Vel laoreet dolor enim justo facilisis neque accumsan, in ad venenatis hac per dictumst nulla ligula, donec mollis massa porttitor ullamcorper risus. Eu platea fringilla, habitasse.'
		]);

		Contact::create([
			'name' => 'Durand',
			'email' => 'durand@la.fr',
			'text' => ' Lorem ipsum erat non elit ultrices placerat, netus metus feugiat non conubia fusce porttitor, sociosqu diam commodo metus in. Himenaeos vitae aptent consequat luctus purus eleifend enim, sollicitudin eleifend porta malesuada ac class conubia, condimentum mauris facilisis conubia quis scelerisque. Lacinia tempus nullam felis fusce ac potenti netus ornare semper molestie, iaculis fermentum ornare curabitur tincidunt imperdiet scelerisque imperdiet euismod.'
		]);

		Contact::create([
			'name' => 'Martin',
			'email' => 'martin@la.fr',
			'text' => 'Lorem ipsum tempor netus aenean ligula habitant vehicula tempor ultrices, placerat sociosqu ultrices consectetur ullamcorper tincidunt quisque tellus, ante nostra euismod nec suspendisse sem curabitur elit. Malesuada lacus viverra sagittis sit ornare orci, augue nullam adipiscing pulvinar libero aliquam vestibulum, platea cursus pellentesque leo dui. Lectus curabitur euismod ad, erat.',
			'seen' => true
		]);

	
	}

}
