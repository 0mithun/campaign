<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use App\Mail\CampaignEmail;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Models\UserEmailSetting;
use Illuminate\Support\Facades\Mail;

class SendCampaign extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:campaign';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send campaign emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $todayCampaigns = Campaign::with('template')
            ->whereDate('date', Carbon::today())
            ->where('times','>', 0)
            ->get();

        foreach ($todayCampaigns as $campaign) {
            $emails = explode(',', $campaign->emails);
            $userSetting = UserEmailSetting::where('user_id', $campaign->template->user_id)->first();

            foreach ($emails as $email) {
                Mail::to(trim($email))
                ->send(new CampaignEmail($campaign->template, $userSetting));
            }

            $campaign->decrement('times');
        }
    }
}
