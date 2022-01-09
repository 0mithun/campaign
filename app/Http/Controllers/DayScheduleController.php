<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDayScheduleRequest;
use App\Http\Requests\UpdateDayScheduleRequest;
use App\Models\CampaignDay;
use App\Models\DaySchedule;
use App\Models\Template;

class DayScheduleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CampaignDay $day)
    {
        $templates = Template::where('user_id', auth()->id())->get();

        return view('schedules.create', compact('day', 'templates',));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDayScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CampaignDay $day, StoreDayScheduleRequest $request)
    {
        $day->times()->create($request->validated());

        return redirect()->route('campaigns.show', $day->campaign_id)->with('success','Schedule create successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaySchedule  $daySchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignDay $day, DaySchedule $schedule)
    {
        // return $schedule;
        $schedule->delete();

        return redirect()->route('campaigns.show', $day->campaign_id)->with('success','Schedule delete successfully!');
    }
}
