<?php

namespace App\Library\JobPosting\States;

use App\Library\JobPosting\Exceptions\IllegalStateTransitionException;
use App\Library\JobPosting\JobPostContext;

abstract class AbstractState
{
    private JobPostContext $jobContext;

    public function __construct(JobPostContext $jobContext)
    {
        $this->jobContext = $jobContext;
    }

    public function getContext()
    {
        return $this->jobContext;
    }

    public function handleCreate()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handleCancel()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handleRetract()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handlePost()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handleAcceptRequest()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handleAccept()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handlePropose()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    public function handleReject()
    {
        throw new IllegalStateTransitionException('Not allowed state transition');
    }

    abstract public function getStatusCode();
}
