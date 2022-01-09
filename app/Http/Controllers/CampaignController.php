<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCampaignRequest;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\Campaign;
use App\Models\CampaignDay;
use App\Models\Template;
use Carbon\Carbon;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaigns = Campaign::where('user_id', auth()->id())->paginate();

        return view('campaigns.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCampaignRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCampaignRequest $request)
    {
        $campaign = auth()->user()->campaigns()->create($request->validated());

        $date = Carbon::parse($request->start_date);
        for ($i=0; $i< $request->how_many_days;  $i++) {
            $campaign->days()->create([
                    'date'  =>  $date,
            ]);

            $date = $date->addDay();
        }

        return redirect()->route('campaigns.index')->with('success','Campaign create successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        $this->authorize('view', $campaign);

        $days = CampaignDay::where('campaign_id', $campaign->id)->paginate();

        return view('campaigns.show', compact('campaign', 'days'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        return view('campaigns.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCampaignRequest  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignRequest $request, Campaign $campaign)
    {
        $this->authorize('update', $campaign);

        $campaign->update($request->except('user_id'));


        $date = Carbon::parse($request->start_date);
        for ($i=0; $i< $request->how_many_days;  $i++) {
            $campaign->days()->create([
                    'date'  =>  $date,
            ]);

            $date = $date->addDay();
        }

        return redirect()->route('campaigns.index')->with('success','Campaign update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        $this->authorize('delete', $campaign);
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success','Campaign delete successfully!');
    }
}
