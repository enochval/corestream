<?php

namespace App\Http\Controllers;

use App\BookedEvent;
use App\Category;
use App\Event;
use App\HostedEvent;
use App\Invoice;
use App\Package;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('displayEvents', 'package','eventDetails');
    }

    public function package()
    {
        $packages = Package::all();
        return view('create-event.package', compact('packages'));
    }

    public function create($id, Package $package)
    {
        $package->updateNoOfClick($id);
        $category = Category::eventCategory();
        return view('create-event.form', compact('category', 'id'));
    }

    public function store(Request $r)
    {
        $this->validate($r, Event::rules());

        $event = Event::store($r);
        if ($event)
        {
            flash('<strong>Event successfully created</strong>')->success();
            return redirect(route('event.confirm', ['id'=>$event->id]));
        }
        else
        {
            flash('<strong>Error: please try again</strong>')->error();
        }

        return back();
    }

    public function confirmEvent($id)
    {
        $event = Event::singleEvent($id);
        return view('create-event.confirm', compact('event'));
    }

    public function invoice($id, Invoice $store)
    {
        $invoice = $store->store($id);
        $event = Event::singleEvent($id);
        return view('create-event.invoice', compact('event', 'invoice'));
    }

    public function edit($id)
    {
        $event = Event::singleEvent($id);

        if ($event->userCreatedThisEvent())
        {
            $category = Category::eventCategory();
            return view('create-event.edit', compact('event', 'category'));
        }else
        {
            flash('<strong>You are not authorized to perform this operation: Contact the Event Host</strong>')->error();
        }
        return redirect(url('/my-event'));
    }

    public function generalEdit($id)
    {
        $event = Event::singleEvent($id);

        if ($event->userCreatedThisEvent())
        {
            $category = Category::eventCategory();
            return view('create-event.general-edit', compact('event', 'category'));
        }else
        {
            flash('<strong>You are not authorized to perform this operation: Contact the Event Host</strong>')->error();
        }
        return redirect(url('/my-event'));
    }

    public function update($id, Request $r)
    {
        $this->validate($r, Event::rules());

        $event = Event::updateEvent($id, $r);

        if ($event)
        {
            flash('<strong>Event successfully updated!</strong>')->success();
            return redirect(route('event.confirm', ['id'=>$event->id]));
        }else
        {
            flash('<strong>Error updating event: please try again</strong>')->error();
        }
        return back();
    }

    public function generalUpdate($id, Request $r)
    {
        $this->validate($r, Event::rules());

        $event = Event::updateEvent($id, $r);

        if ($event)
        {
            flash('<strong>Event successfully updated!</strong>')->success();
            return redirect(route('my.event'));
        }else
        {
            flash('<strong>Error updating event: please try again</strong>')->error();
        }
        return back();
    }

    public function displayEvents()
    {
        $image_class = Event::IMAGE_CLASS;
        $events = Event::orderBy('id','desc')->paginate('10');
        $categories = Category::orderBy('name')->get();

        return view('book.event', compact('events', 'categories', 'image_class'));
    }

    public function myEvents()
    {
        $hosted = HostedEvent::userHostedEvent(auth()->id());
        $booked = BookedEvent::userBookedEvent(auth()->id());
        //$viewed = ''

        return view('myevent.index', compact('hosted', 'booked'));
    }

    public function index()
    {
        $hosted = HostedEvent::getAllHostedEvent();
        return view('admin.event.index', compact('hosted'));

    }

    public function approve($id)
    {
        if (User::canApproveOrDeclineEvent())
        {
            $response = [
                'status' => '',
            ];
            if (Event::isApproved($id))
            {
                $response['status'] = 'approved';
                return response()->json($response);
                /*flash('<strong>This event is already approved and published</strong>')->warning();
                return back();*/
            }else
            {
                if (Event::approve($id))
                {
                    $response['status'] = true;
                    return response()->json($response);
                }
                    /*flash('<strong>This event is successfully approved and published to the public</strong>')->success();*/
                else
                {
                    $response['status'] = false;
                    return response()->json($response);
                }
                    /*flash('<strong>Error: Something went wrong, Please try again</strong>')->error();*/

                /*return back();*/
            }
        }else
        {
            /*flash('<strong>Sorry: You do not have the permission to perform this operation, contact the admin</strong>')->success();*/
            $response['status'] = 'denied';
            return response()->json($response);
        }

        /*return back();*/
    }

    public function decline($id)
    {
        $response = [
            'status'=>''
        ];
        if (User::canApproveOrDeclineEvent())
        {
            if (Event::isDeclined($id))
            {
                $response['status'] = 'declined';
                return response()->json($response);
            }else
            {
                if (Event::decline($id))
                {
                    $response['status'] = true;
                    return response()->json($response);
                }
                else
                {
                    $response['status'] = false;
                    return response()->json($response);
                }
            }
        }else
        {
            $response['status'] = 'denied';
            return response()->json($response);
           /* flash('<strong>Sorry: You do not have the permission to perform this operation, contact the admin</strong>')->success();*/
        }
        /*return back();*/
    }

    public function manage($id)
    {
        $category = Category::eventCategory();
        $event = Event::singleEvent($id);
        return view('admin.event.manage', compact('event', 'category'));
    }

    public function eventDetails($id)
    {
        $event = Event::singleEvent($id);
        $event_host_id = $event->hosted_event->user_id;
        return view('book.detail', compact('event', 'event_host_id'));
    }

    public function bookedEvent($id)
    {
        $event = Event::singleEvent($id);
        $booked = BookedEvent::booked($event->id);
        if ($booked)
            flash('<strong>Event booked successfully</strong>')->success();
        else
            flash('<strong>Event was not successfully booked, please try again</strong>')->warning();

        return back();
    }

    public function watchEvent($id)
    {
        $event = Event::singleEvent($id);

        return view('watch.pending', compact('event'));
    }
}
