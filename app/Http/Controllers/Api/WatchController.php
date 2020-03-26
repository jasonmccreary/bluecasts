<?php

namespace App\Http\Controllers\Api;

use App\Api\Watch;
use App\Http\Requests\Api\WatchStoreRequest;
use Illuminate\Http\Request;

class WatchController extends Controller
{
    /**
     * @param \App\Http\Requests\Api\WatchStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WatchStoreRequest $request)
    {
        $watch = Watch::create($request->all());

        return response()->noContent();
    }
}
