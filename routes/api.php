<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// CLIENTS
Route::get('clients', 'Clients\IndexController@getIndex')->name('clients.tasks.index');
Route::get('clients/{id}/jobs', 'Clients\JobPostController@getIndex')->name('client.jobs.index');

// PROVIDERS
Route::get('providers', 'Providers\IndexController@getIndex')->name('providers.tasks.index');
Route::get('providers/{id}/jobs', 'Providers\JobPostController@getIndex')->name('providers.jobs.index');
Route::post('providers/jobs/propose', 'Providers\JobPostController@postPropose')->name('providers.jobs.propose');
Route::get('providers/{id}/proposals', 'Providers\JobPostController@getProposals')->name('providers.proposals');

// JOBS
Route::get('jobs', 'JobPostController@getIndex')->name('jobs.index');
Route::post('jobs', 'JobPostController@postCreate')->name('jobs.create');
Route::put('jobs/{id}', 'JobPostController@putUpdate')->name('jobs.update');
