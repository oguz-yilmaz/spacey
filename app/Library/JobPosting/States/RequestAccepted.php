<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class RequestAccepted extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_REQUEST_ACCEPTED;
    }

    public function handlePropose()
    {
        $context = $this->getContext();

        // HANDLE STUFF ...

        $context->setState(new Proposed($context));
    }
}
