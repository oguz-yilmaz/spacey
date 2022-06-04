<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class Started extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_STARTED;
    }

    public function handleCreate()
    {
        $context = $this->getContext();

        // HANDLE STUFF ...

        $context->setState(new Drafted($context));
    }
}
