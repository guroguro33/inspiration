<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PurchaseReport extends Mailable
{
  use Queueable, SerializesModels;

  protected $user;
  protected $idea;
  protected $isBuyer;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($user, $idea, $isBuyer)
  {
    $this->user = $user;
    $this->idea = $idea;
    $this->isBuyer = $isBuyer;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('emails.purchaseReportMail')
                ->text('emails.purchaseReportMail_plain')
                ->from('info@inspiration.com', 'Inspirationカスタマーセンター')
                ->subject('[Inspiration]購入お知らせメール')
                ->with([
                  'user' => $this->user,
                  'idea' => $this->idea,
                  'isBuyer' => $this->isBuyer,
                ]);
  }
}
