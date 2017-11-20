<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Unicodeveloper\Paystack\Facades\Paystack;

class Payment extends Model
{
    protected $fillable = ['user_id', 'event_id', 'status', 'amount', 'transaction_ref', 'last_4', 'auth_code', 'provider'];

    const
        PAYSTACK_PROVIDER = 'paystack',
        PAID = 1,
        NOT_PAID = 0,
        KOBO = 100;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public static function storePaystackResponse($type = null)
    {
        $paymentDetails = Paystack::getPaymentData();

        if($paymentDetails['status'])
        {
            $uri = $paymentDetails['data']['metadata']['referrer'];
            $re = '/\s*[0-9]+(,\s*[0-9])*$/';
            preg_match_all($re, $uri, $matches, PREG_SET_ORDER, 0);
            $event_id = (int)$matches[0][0];

            static::create([
                'user_id'=>auth()->id(),
                'event_id'=>$event_id,
                'status'=>$paymentDetails['status'],
                'amount'=>$paymentDetails['data']['amount'] / self::KOBO,
                'transaction_ref'=>$paymentDetails['data']['reference'],
                'last_4'=>$paymentDetails['data']['authorization']['last4'],
                'auth_code'=>$paymentDetails['data']['authorization']['authorization_code'],
                'provider'=>self::PAYSTACK_PROVIDER,
            ]);

            if ($type == 'book')
            {
                if (BookedEvent::updatePaymentStatus($event_id));
                return true;
            }else
                {
                    if (Event::updateEventPaymentStatus($event_id))
                    return true;
                }

        }
        return false;
    }
}
