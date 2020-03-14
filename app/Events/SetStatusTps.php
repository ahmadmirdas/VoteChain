<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SetStatusTps implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tps;

    public function __construct(\App\Tps $tps)
    {
        $this->tps = $tps;
    }

    public function broadcastOn()
    {
        return ['voted-tps'];
    }

    public function broadcastAs()
    {
        return 'voted-'.$this->tps->id;
    }
}
