<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Employee;
use App\Models\Provider;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
         Client::factory(5)->create();
         Provider::factory(5)->create();
         Employee::factory(15)->create();
    }
}
