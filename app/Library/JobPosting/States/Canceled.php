<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class Canceled extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_CANCELED;
    }
}
