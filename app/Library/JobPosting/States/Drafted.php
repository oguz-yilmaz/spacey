<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class Drafted extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_DRAFTED;
    }

    public function handlePost()
    {
        $context = $this->getContext();

        // HANDLE STUFF ...

        $context->setState(new Posted($context));
    }

    public function handleCancel()
    {
        $context = $this->getContext();

        // HANDLE STUFF ...

        $context->setState(new Canceled($context));
    }
}
