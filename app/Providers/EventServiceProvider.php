<?php

namespace App\Providers;

use App\Subscribers\ProcessingSubscriber;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $subscribe = [ProcessingSubscriber::class];
}
