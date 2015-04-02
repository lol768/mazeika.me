<?php namespace Mazeikame\Contracts;

interface SubscriptionRepositoryContract {

    function subscribe(&$email);

    function confirm($token);

    function unsubscribe($token);

    function getAllConfirmedEmails();

}