<?php

namespace App\Http\Controllers\API;

use App\Events\AwardProcess;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\RegisterRequest;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function index()
    {
        return response(Event::paginate(20));
    }

    public function create()
    {
        # code...
    }

    public function store(Request $request)
    {
        # code...
    }

    public function edit(Event $event)
    {
        # code...
    }

    public function update(Request $request, Event $event)
    {
        # code...
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return rest(true);
    }

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
