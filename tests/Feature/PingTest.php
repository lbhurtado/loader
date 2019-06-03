<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use LBHurtado\EngageSpark\Events\MessageSent;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        // $this->app['config']->set('missive.relay.default', 'local');

        $this->assertTrue(true);
        
        // $attributes = [
        //     'from' => '+639173011987',
        //     'to' => '+639189362340',
        //     'message' => 'PING'
        // ];

        // $response = $this->post('api/sms/relay', $attributes);
        // $response = $this->json('POST', '/api/sms/relay', );

        // $response->assertStatus(200);

        // dd($response);
        // Event::assertDispatched(MessageSent::class, function ($event) use ($mobile, $message, $senderId)  {
        //     return $event->mobile == '+639173011987' && $event->message == 'PONG';
        // });

    }
}
