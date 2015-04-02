<?php namespace Mazeikame\Contracts;

use Mazeikame\Post;

interface PostRepositoryContract {

    function create($title, $content);

    function retrieve($slug);

    function retrieveAll();

    function notifyAll(SubscriptionRepositoryContract $subscriptionRepository, $post);

    function delete($id);

}