<?php


namespace App\Library\JobPosting\Traits;


use App\Models\JobPost;

trait ChecksState
{
    public function isStarted()
    {
        return $this->jobModel->status === JobPost::STATUS_STARTED;
    }

    public function isDrafted()
    {
        return $this->jobModel->status === JobPost::STATUS_DRAFTED;
    }

    public function isCanceled()
    {
        return $this->jobModel->status === JobPost::STATUS_CANCELED;
    }

    public function isPosted()
    {
        return $this->jobModel->status === JobPost::STATUS_POSTED;
    }

    public function isRequestAccepted()
    {
        return $this->jobModel->status === JobPost::STATUS_REQUEST_ACCEPTED;
    }

    public function isProposed()
    {
        return $this->jobModel->status === JobPost::STATUS_PROPOSED;
    }

    public function isClosed()
    {
        return $this->jobModel->status === JobPost::STATUS_CLOSED;
    }

    public function isContracted()
    {
        return $this->jobModel->status === JobPost::STATUS_CONTRACTED;
    }
}
