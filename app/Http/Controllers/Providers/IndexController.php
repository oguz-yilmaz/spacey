<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Models\Provider;

class IndexController extends Controller
{
    public function getIndex()
    {
        $providers = Provider::all();

        return response()->json([
            'providers' => $providers
        ]);
    }
}
