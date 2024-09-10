<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $paymentUrl;

    public function __construct($paymentUrl)
    {
        $this->paymentUrl = $paymentUrl;
    }

    public function build()
    {
        return $this->subject('Betaalverzoek voor Inschrijving')
                    ->view('emails.payment_request')
                    ->with(['paymentUrl' => $this->paymentUrl]);
    }
    
}

