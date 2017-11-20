<?php

namespace App\Http\Controllers;

use App\Event;
use App\Payment;
use Illuminate\Http\Request;
use Mockery\Exception;
use Unicodeveloper\Paystack\Facades\Paystack;


class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway($id)
    {
        $event = Event::singleEvent($id);
        if ($event->hosted_event->user_id == auth()->id())
        {
            if ($event->hostHasPaid($id))
            {
                flash('<strong>This event has already been paid</strong>')->warning();
                return redirect(url('my-event'));
            }
        }elseif ($event->booked_event->user_id == auth()->id())
        {
            if ($event->bookedHasPaid($id))
            {
                flash('<strong>This event has already been paid</strong>')->warning();
                return back();
            }
        }
        return Paystack::getAuthorizationUrl()->redirectNow();

    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        if (Payment::storePaystackResponse())
        {
            flash('<strong>Payment successful</strong>')->success();
            return redirect(url('my-event'));
        }else
        {
            flash('<strong>Connection Error occurred: Please try again later</strong>')->error();
            return back();
        }
    }

    public function handleGatewayBookCallback()
    {
        if (Payment::storePaystackResponse('book'))
        {
            flash('<strong>Payment successful</strong>')->success();
            return back();
        }else
        {
            flash('<strong>Connection Error occurred: Please try again later</strong>')->error();
            return back();
        }
    }
}
