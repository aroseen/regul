<?php
/**
 * Created by PhpStorm.
 * User: aRosen_LN
 * Date: 09.06.2018
 * Time: 13:58
 */

namespace App\Subscribers;

use App\Events\ProcessingFinished;
use App\Events\ProcessingStarted;
use App\Jobs\LongTaskJob;

/**
 * Class ProcessingSubscriber.
 *
 * @package App\Subscribers
 */
class ProcessingSubscriber
{
    /**
     * @param $event
     */
    public function onProcessingStarted($event): void
    {
        dispatch(new LongTaskJob())->onQueue('jobs');
    }

    /**
     * @param $event
     */
    public function onProcessingFinished($event): void
    {
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events): void
    {
        $events->listen(ProcessingStarted::class, 'App\Subscribers\ProcessingSubscriber@onProcessingStarted');
        $events->listen(ProcessingFinished::class, 'App\Subscribers\ProcessingSubscriber@onProcessingFinished');
    }
}