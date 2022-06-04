<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\JobPost;

class JobPostController extends Controller
{
    public function getIndex($id)
    {
        $jobs = JobPost::where('client_id', $id)->get();

        return response()->json([
            'jobs' => $jobs
        ]);
    }
}
