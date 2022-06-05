<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class Proposed extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_PROPOSED;
    }

    public function handleAccept()
    {
        $context = $this->getContext();

        $context->setData(collect([]))
            ->setState(new Contracted($context));
    }

    public function handleReject()
    {
        $context = $this->getContext();

        $context->setData(collect([]))
            ->setState(new Posted($context));
    }
}
