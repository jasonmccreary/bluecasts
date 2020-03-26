<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Watch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\WatchController
 */
class WatchControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\Api\WatchController::class,
            'store',
            \App\Http\Requests\WatchStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves()
    {
        $user_id = $this->faker->randomDigitNotNull;
        $video_id = $this->faker->randomDigitNotNull;

        $response = $this->post(route('watch.store'), [
            'user_id' => $user_id,
            'video_id' => $video_id,
        ]);

        $watches = Watch::query()
            ->where('user_id', $user_id)
            ->where('video_id', $video_id)
            ->get();
        $this->assertCount(1, $watches);
        $watch = $watches->first();
    }
}
