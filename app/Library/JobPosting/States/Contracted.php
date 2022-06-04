<?php

namespace App\Library\JobPosting\States;

use App\Models\JobPost;

class Contracted extends AbstractState
{
    public function getStatusCode()
    {
        return JobPost::STATUS_CONTRACTED;
    }
}
