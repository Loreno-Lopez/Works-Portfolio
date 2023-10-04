<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;


class NoticeAnnouncement extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $announcement;

    public function __construct(User $user, $announcement)
    {
        $this->announcement = $announcement;
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('presto.it@noreplay.com')->view('mail.notice_announcement');
    }
    /**
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

}
