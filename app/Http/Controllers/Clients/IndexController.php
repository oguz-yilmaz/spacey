<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;

class IndexController extends Controller
{
    public function getIndex()
    {
        $clients = Client::all();

        return response()->json([
            'clients' => $clients
        ]);
    }
}
