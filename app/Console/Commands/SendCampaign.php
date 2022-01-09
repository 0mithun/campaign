<?php

namespace App\Console\Commands;

use App\Models\Campaign;
use App\Mail\CampaignEmail;
use App\Models\DaySchedule;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;
use App\Models\UserEmailSetting;
use Database\Seeders\CampaignSeeder;
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
        $time = $time = Carbon::parse(now())->toTimeString();

        $times = DaySchedule::whereHas('day', function($q){
            $q->whereDate('date', Carbon::today());
        })
        ->whereTime('time','>=', $time)
        ->where('is_complete', 0)
        ->with('template','day.campaign')
        ->get();

        foreach ($times as $time) {
            $emails = explode(',', $time->day->campaign->emails);
            $userSetting = UserEmailSetting::where('user_id', $time->day->campaign->user_id)->first();

            foreach ($emails as $email) {
                Mail::to(trim($email))
                ->send(new CampaignEmail($time->template, $userSetting));
            }
            $time->update(['is_complete'=> 1]);
        }
    }
}
