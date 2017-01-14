<?php

namespace App\Jobs\Inventory;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Library\InventoryHandler as Inventory;
use App\Stamp;

class Save implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;


    public $items;
    public $user_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $items, $user_id)
    {
        $this->items = $items;
        $this->user_id = $user_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Inventory::save($this->items, $this->user_id);
    }
}
