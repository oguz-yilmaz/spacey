<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\JobPost;
use App\Library\JobPosting\JobPostContext;
use Exception;

class JobPostController extends Controller
{
    public function getIndex()
    {
        $jobs = JobPost::all();

        return response()->json([
            'jobs' => $jobs
        ]);
    }

    public function postCreate(JobRequest $request)
    {
        $data = $request->all();

        JobPost::create($data);

        return response()->json([
            'jobs' => $data
        ]);
    }

    public function putUpdate(JobRequest $request, $id)
    {
        $data = $request->all();

        $jobPost = JobPost::findOrFail($id);

        $jobPostContext = new JobPostContext($jobPost, $data);

        if ($jobPostContext->isNotAllowed()) {
            throw new Exception('Not allowed!');
        }

        $jobPostContext->update();

        return response()->json([
            'job' => $data
        ]);
    }
}
