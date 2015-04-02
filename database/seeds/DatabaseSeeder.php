<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MazeikaMe\Post;
use MazeikaMe\Services\PostRepository;
use MazeikaMe\Services\SubscriptionRepository;
use MazeikaMe\Subscriber;
use MazeikaMe\Subscription;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('PostsTableSeeder');
	}

}

class PostsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        $postsRepository = new PostRepository;

        $postsRepository->create('Lorem markdownum actutum Mavortis', file_get_contents(__DIR__.'/sample-markdown.php'));
        $postsRepository->create('Qua fuge minimo fuit adiacet sub ostendit', file_get_contents(__DIR__.'/sample-markdown.php'));
    }

}