<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EvaluationReport extends Mailable
{
  use Queueable, SerializesModels;

  protected $user;
  protected $evaluation;
  protected $isFirstReview;
  
  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($user, $evaluation, $isFirstReview)
  {
    $this->user = $user;
    $this->evaluation = $evaluation;
    $this->isFirstReview = $isFirstReview;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('emails.evaluationReportMail')
                ->text('emails.evaluationReportMail_plain')
                ->from('info@inspiration.com', 'Inspirationカスタマーセンター')
                ->subject('[Inspiration]レビュー受領お知らせメール')
                ->with([
                  'user' => $this->user,
                  'evaluation' => $this->evaluation,
                  'isFirstReview' => $this->isFirstReview,
                ]);
  }
}
