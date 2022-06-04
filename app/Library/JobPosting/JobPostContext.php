<?php

namespace App\Library\JobPosting;

use App\Library\JobPosting\States\AbstractState;
use App\Library\JobPosting\States\Started;
use App\Library\JobPosting\Traits\ChecksState;
use App\Models\Client;
use App\Models\JobPost as JobPostModel;
use App\Models\Provider;
use Exception;
use Illuminate\Support\Collection;

class JobPostContext
{
    use ChecksState;

    private AbstractState $state;

    private ?string $issuerType;

    private int $statusFrom;

    private int $statusTo;

    public function __construct(
        private JobPostModel $jobModel,
        private array|Collection $data
    ) {
        $this->statusFrom = $this->jobModel->status;
        $this->statusTo = $data['status'];
        $this->data = collect($this->data);

        $this->setIssuerType();
        $this->setState(new Started($this));
    }

    public function update()
    {
        $action = $this->getAction();

        if ($action) {
            $this->{$action}();
        }
    }

    public function setIssuerType()
    {
        if ($this->jobModel->client_id) {
            $this->issuerType = Client::class;
        }
        elseif ($this->jobModel->provider_id && !$this->jobModel->client_id) {
            $this->issuerType = Provider::class;
        }
        else {
            $this->issuerType = null;
        }
    }

    public function setState(AbstractState $state): self
    {
        $this->state = $state;

        $this->jobModel->update(
            $this->data->put('status', $state->getStatusCode())->all()
        );

        return $this;
    }

    public function isNotAllowed(): bool
    {
        if ($this->statusTo === $this->statusFrom) {
            return false;
        }

        foreach ($this->getCurrentActions() as $action => $value) {
            if ($value[0] === $this->statusTo && $value[1] === $this->issuerType) {
                return false;
            }
        }

        return true;
    }

    public function getAction(): string
    {
        if ($this->statusTo === $this->statusFrom) {
            return '';
        }

        foreach ($this->getCurrentActions() as $action => $value) {
            if ($value[0] === $this->statusTo) {
                return $action;
            }
        }

        throw new Exception('No action found');
    }

    private function getCurrentActions(): array
    {
        $statuses = config('jobs.statuses');

        if (!isset($statuses[$this->statusFrom])) {
            throw new Exception('Invalid operation.');
        }

        $current = $statuses[$this->statusFrom];

        return $current['actions'];
    }

    public function create()
    {
        $this->state->handleCreate();
    }

    public function cancel()
    {
        $this->state->handleCancel();
    }

    public function post()
    {
        $this->state->handlePost();
    }

    public function retract()
    {
        $this->state->handleRetract();
    }

    public function acceptRequest()
    {
        $this->state->handleAcceptRequest();
    }

    public function propose()
    {
        $this->state->handlePropose();
    }

    public function reject()
    {
        $this->state->handleReject();
    }

}
