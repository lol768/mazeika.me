<?php namespace Mazeikame\Http\Controllers;

use Mazeikame\Contracts\PostRepositoryContract;
use Mazeikame\Contracts\SubscriptionRepositoryContract;
use Mazeikame\Post;
use Mazeikame\Services\SubscriptionRepository;

class AdminController extends Controller {

	public function index()
	{
        $with = $this->prepare('New Post');

		return view('admin.new-post', $with);
	}

}
