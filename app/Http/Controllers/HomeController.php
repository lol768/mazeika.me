<?php namespace Mazeikame\Http\Controllers;

use Mazeikame\Contracts\PostRepositoryContract;
use Mazeikame\Contracts\SubscriptionRepositoryContract;
use Mazeikame\Post;
use Mazeikame\Services\SubscriptionRepository;

class HomeController extends Controller {

	public function index(PostRepositoryContract $postRepository)
	{
        $with = $this->prepare('Home');

        $with += ['posts' => $postRepository->retrieveAll()];

		return view('home', $with);
	}

}
