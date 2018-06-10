<?php

namespace App\Jobs;

use App\Events\ProcessingFinished;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class LongTaskJob
 * @package App\Jobs
 */
class LongTaskJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var int
     */
    private $sleep;

    /**
     * Create a new job instance.
     *
     * @param int $sleep
     */
    public function __construct(int $sleep = 180)
    {
        $this->sleep = $sleep;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        sleep($this->sleep);
        broadcast(new ProcessingFinished());
    }
}
