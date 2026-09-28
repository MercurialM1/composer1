<?php

namespace App\Observers;

use App\Mail\cancelMail;
use App\Mail\finallMail;
use App\Mail\StatusMail;
use App\Mail\StatusProgressMail;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

class MailObserver
{
    public function created(Order $order)
    {
        $email = $order->user->email;

        Mail::to($email)->send(new StatusMail($order));
    }
    public function updated(Order $order): void
    {   //нож в печень if else вечен
        $email = $order->user->email;

        if ($order->wasChanged('status')) {
            if ($order->status == 'completed') {
                Mail::to($email)->send(new finallMail($order));
            }
            if ($order->status == 'processing') {
                Mail::to($email)->send(new StatusProgressMail($order));
            }
            if ($order->status == 'cancelled') {
                Mail::to($email)->send(new cancelMail($order));
            }
        }
    }
}
