<?php namespace Mazeikame\Services;

use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mazeikame\Contracts\PostRepositoryContract;
use Mazeikame\Contracts\SubscriptionRepositoryContract;
use Mazeikame\Post;
use Mazeikame\Subscription;
use ParsedownExtra;

class PostRepository implements PostRepositoryContract {

    public function create($title, $content)
    {
        $validator = Validator::make(compact('title', 'content'), [
            'title' => 'required|max:255|unique:posts',
            'content' => 'required|max:16777215'
        ]);

        if ($validator->fails())
        {
            abort(400, $validator->messages()->first());
        }

        $md = (new ParsedownExtra)->text($content);
        $slug = $this->slugify($title);

        if ($slug === 'new')
        {
            abort(400, 'Cannot be named "new"');
        }

        $post = new Post;
        $post->title = $title;
        $post->slug = $slug;
        $post->content = $md;
        $post->save();

        return $post;
    }

    public function retrieve($slug)
    {
        return Post::where('slug', $slug)->first();
    }

    public function retrieveAll()
    {
        return Post::all();
    }

    public function notifyAll(SubscriptionRepositoryContract $subscriptionRepository, $post)
    {
        Mail::send('emails.subscriptions.new-post', compact('post'), function($message) use($subscriptionRepository)
        {
            $message
                ->from('subscriptions@mazeika.me', 'mazeika.me')
                ->to($subscriptionRepository->getAllConfirmedEmails())
                ->subject('mazeika.me - New Post');
        });
    }

    public function delete($id)
    {
        Post::find($id)->delete();
    }

    private function slugify($text)
    {
        // replace non-letter or digits with -
        $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

        // trim
        $text = trim($text, '-');

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // lowercase
        $text = strtolower($text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        return empty($text) ? 'n-a' : $text;
    }

}