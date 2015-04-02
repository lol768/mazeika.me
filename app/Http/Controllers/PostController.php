<?php namespace Mazeikame\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Mazeikame\Contracts\PostRepositoryContract;
use Mazeikame\Contracts\SubscriptionRepositoryContract;

class PostController extends Controller {

    private $postRepository;

    public function __construct(PostRepositoryContract $postRepository)
    {
        $this->postRepository = $postRepository;
    }

	public function showPost($slug)
	{
        $with = $this->prepare('Home');

        $post = $this->postRepository->retrieve($slug);

        if ($post === null)
        {
            abort(404, 'Post not found.');
        }

        $with += compact('post');

		return view('post', $with);
	}

    public function newPost(SubscriptionRepositoryContract $subscriptionRepository)
    {
        $title = Input::get('title');
        $content = Input::get('content');

        $post = $this->postRepository->create($title, $content);
        $this->postRepository->notifyAll($subscriptionRepository, $post);

        $with = $this->prepare('Post Created');

        $with += compact('post');

        return view('admin.post-created', $with);
    }

}
