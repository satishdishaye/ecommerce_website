<?php
namespace App\Jobs;

use App\Mail\PaymentConfirmationMail;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail as MailFacade;

class SendPaymentConfirmationEmail implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $order;

    /**
     * Create a new job instance.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      
        MailFacade::to($order->email)->send(new PaymentConfirmationMail($this->order));
    }
}
