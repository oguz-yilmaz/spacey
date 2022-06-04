<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProposalRequest;
use App\Models\JobPost;
use App\Models\Proposal;

class JobPostController extends Controller
{
    public function getIndex($id)
    {
        $jobs = JobPost::where('provider_id', $id)->get();

        return response()->json([
            'jobs' => $jobs
        ]);
    }

    public function getProposals($id)
    {
        $proposals = Proposal::where('provider_id', $id)->get();

        return response()->json([
            '$proposals' => $proposals
        ]);
    }

    public function postPropose(ProposalRequest $proposalRequest)
    {
        $proposal = Proposal::create($proposalRequest->all());

        return response()->json([
            'proposal' => $proposal
        ]);
    }
}
