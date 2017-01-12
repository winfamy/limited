<?php

namespace App\Jobs\Inventory;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Stamp;

class Save implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    public $items;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->items as $item) {
            Stamp::create([
                'type' => 'uaid',
                'object_id' => $item['id'],
                'value' => $item['uaid']
            ]);
        }
    }
}
