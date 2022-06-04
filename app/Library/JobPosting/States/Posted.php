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

        if (!$this->data->has('provider_id')) {
            throw new Exception('No provider id provided.');
        }

        $context->setState(new RequestAccepted($context));
    }
}
