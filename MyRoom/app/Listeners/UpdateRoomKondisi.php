<?php

namespace App\Listeners;

use App\Events\TransaksiDigunakan;
use App\Models\Room;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateRoomKondisi
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransaksiDigunakan $event): void
    {
        $room = Room::find($event->transaksiId);

        if ($room) {
            $room->update(['kondisi' => 'Terisi']);
        }
    }
}
