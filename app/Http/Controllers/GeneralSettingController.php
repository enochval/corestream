<?php

namespace App\Http\Controllers;

use App\Event;
use App\HostedEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class GeneralSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function eventUrl($id, Request $r)
    {
        $this->validate($r, [
           'uri' =>'required|url'
        ]);
        if (Event::updateEventLink($id, $r))
        {
            flash('<strong>Event link successfully updated!</strong>')->success();
            return redirect(URL::previous());
        }

        return back();
    }

    public function eventGoLive($id)
    {
        if (Event::goLive($id))
        {
            flash('<strong>This Link is successfully active for this event</strong>')->success();
            return redirect(URL::previous());
        }else
        {
            flash('<strong>Error: Please try again</strong>')->error();
            return back();
        }
    }

    public function disableUrl($id)
    {
        if (Event::disableLink($id))
        {
            flash('<strong>This Link is successfully disabled for this event</strong>')->success();
            return redirect(URL::previous());
        }else
        {
            flash('<strong>Error: Please try again</strong>')->error();
            return back();
        }
    }
}
