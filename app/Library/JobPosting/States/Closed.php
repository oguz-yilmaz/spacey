<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class Closed extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_CLOSED;
    }
}
