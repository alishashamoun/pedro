<?php
namespace App\Services;

use Twilio\Rest\Client;


class TwilioService
{
    protected $twilio;

    // public function __construct()
    // {
    //     $this->twilio = new Client(config('services.twilio.sid'), config('services.twilio.token'));
    // }
    public function sendNotify($to, $message)
    {
        $this->twilio->notify->services(config('services.twilio.sid'))
            ->notifications
            ->create([
                'toBinding' => [
                    'binding_type' => 'sms',
                    'address' => $to,
                ],
                'body' => $message,
            ]);
    }

    public function sendSMS($to, $message)
    {
        $this->twilio->messages
            ->create($to, [
                'from' => config('services.twilio.phone_number'),
                'body' => $message,
            ]);
    }
}
