<?php namespace Mazeikame\Services;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mazeikame\Contracts\SubscriptionRepositoryContract;
use Mazeikame\Subscription;

class SubscriptionRepository implements SubscriptionRepositoryContract {

    public function subscribe(&$email)
    {
        $token = $this->generateToken();

        $validator = Validator::make(compact('email'), [
            'email' => 'required|email|max:255|unique:subscriptions'
        ]);

        if ($validator->fails())
        {
            abort(400, $validator->messages()->first());
        }

        Subscription::create([
            'email' => $email,
            'token' => $token,
            'expires' => (new Carbon)->addHours(24)
        ]);

        $email = strtolower($email);

        Mail::send('emails.subscriptions.confirmation', compact('token'), function($message) use($email)
        {
            $message
                ->from('subscriptions@mazeika.me', 'mazeika.me')
                ->to($email)
                ->subject('mazeika.me - Subscription Confirmation');
        });
    }

    public function confirm($token)
    {
        $subscription = $this->getSubscription($token);

        if ($subscription->confirmed) dd('Already confirmed!');

        $subscription->confirmed = true;

        $subscription->save();

        return $subscription->email;
    }

    public function unsubscribe($token)
    {
        $subscription = $this->getSubscription($token);

        $subscription->delete();

        return $subscription->email;
    }

    public function getAllConfirmedEmails()
    {
        return Subscription::where('confirmed', true)->lists('email');
    }

    private function generateToken()
    {
        return 'mzk'.uniqid().bin2hex(openssl_random_pseudo_bytes(24));
    }

    private function getSubscription($token)
    {
        return Subscription::where('token', $token)->firstOrFail();
    }

}