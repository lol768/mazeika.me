<?php namespace Mazeikame\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Mazeikame\Contracts\SubscriptionRepositoryContract;
use Mazeikame\Http\Requests;

class SubscriptionController extends Controller {

    private $subscriptionRepository;

    public function __construct(SubscriptionRepositoryContract $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }

	public function subscribe()
	{
        $email = Input::get('email');

		$this->subscriptionRepository->subscribe($email);

        return view('subscriptions.subscribed', ['title' => 'Subscribed', 'email' => $email]);
	}

    public function confirm()
    {
        $email = $this->subscriptionRepository->confirm(Input::get('token'));

        return view('subscriptions.confirmed', ['title' => 'Confirmed', 'email' => $email]);
    }

    public function unsubscribe()
    {
        $email = $this->subscriptionRepository->unsubscribe(Input::get('token'));

        return view('subscriptions.confirmed', ['title' => 'Unsubscribed', 'email' => $email]);
    }

}
