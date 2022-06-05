<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;
use Exception;

class Posted extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_POSTED;
    }

    public function handleRetract()
    {
        $context = $this->getContext();

        // HANDLE STUFF ...

        $context->setState(new Drafted($context));
    }

    public function handleAcceptRequest()
    {
        $context = $this->getContext();

        if (!$context->getData()->has('provider_id')) {
            throw new Exception('No provider id provided.');
        }

        // Ensure that provider we can only update the status
        // and no other fields of a job post
        $context->setData($context->getData()->only(['provider_id', 'status']));

        $context->setState(new RequestAccepted($context));
    }
}
