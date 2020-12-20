<?php

namespace App\Http\Controllers\API;

use App\Events\AwardProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Models\Event;
use App\Models\Mobile;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function register(RegisterRequest $request, Event $event)
    {
        try {
            event(new AwardProcess($event, $request->code, $request->mobile));
            return rest(true);
        } catch (\Exception $e) {
            return rest(false, [], $e);
        }
    }
}
