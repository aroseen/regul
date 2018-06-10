<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Class ProcessingFinished
 * @package App\Events
 */
class ProcessingFinished implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @return Channel|Channel[]
     */
    public function broadcastOn()
    {
        return new Channel('processing');
    }

    /**
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'title'        => 'Новое оповещение',
            'notification' => 'Обработка завершена',
        ];
    }
}
