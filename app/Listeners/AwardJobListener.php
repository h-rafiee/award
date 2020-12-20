<?php

namespace App\Listeners;

use App\Events\AwardProcess;
use App\Models\Mobile;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Winner;

class AwardJobListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AwardProcess  $event
     * @return void
     */
    public function handle(AwardProcess $event)
    {
        $mobile = Mobile::firstOrCreate([
            'mobile' => $event->mobile
        ]);
        $code = $event->event->codes()
                    ->where('code', $event->code)
                    ->sharedLock()
                    ->first();
        $winner = Winner::where([
            'event_id' => $event->event->id,
            'event_code_id' => $code->id,
            'mobile_id' => $mobile->id   
        ])->first();
        if (!$winner) {
            $is_win = false;
            if ($code->count > 0 && $code->expires_at > now()->toDateTimeString()) {
                $is_win = true;
                $code->count = $code->count - 1;
                $code->save();
            }
            Winner::create([
                'event_id' => $event->event->id,
                'event_code_id' => $code->id,
                'mobile_id' => $mobile->id,
                'is_win' => $is_win
            ]);
        }
        return true;
    }
}
