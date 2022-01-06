<?php

namespace App\Mail;

use App\Models\User;
use App\Models\Template;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use App\Models\UserEmailSetting;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CampaignEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $template;
    protected $mailSetting;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Template $template, $mailSetting)
    {
        $this->template = $template;
        $this->mailSetting = $mailSetting;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->configSwiftMailer($this->mailSetting);

        return $this->from(trim($this->mailSetting->username))
            ->markdown('emails.campaign', ['subject'=>$this->template->subject, 'body'=>$this->template->body])
            ->subject($this->template->subject);
    }

    /**
     * Config Swift Mailer
     *
     * @param UserEmailSetting $setting
     * @return void
     */
    private function configSwiftMailer(UserEmailSetting $setting)
    {
        $transport = (new \Swift_SmtpTransport($setting->mail_host, $setting->mail_port))
                ->setEncryption($setting->mail_encryption)
                ->setUsername($setting->mail_username)
                ->setPassword($setting->mail_password);
        Mail::setSwiftMailer(new \Swift_Mailer($transport));
    }
}
