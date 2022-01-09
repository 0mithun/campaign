<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDayScheduleRequest;
use App\Http\Requests\UpdateDayScheduleRequest;
use App\Models\DaySchedule;

class DayScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDayScheduleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDayScheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DaySchedule  $daySchedule
     * @return \Illuminate\Http\Response
     */
    public function show(DaySchedule $daySchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaySchedule  $daySchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(DaySchedule $daySchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDayScheduleRequest  $request
     * @param  \App\Models\DaySchedule  $daySchedule
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDayScheduleRequest $request, DaySchedule $daySchedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DaySchedule  $daySchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(DaySchedule $daySchedule)
    {
        //
    }
}
