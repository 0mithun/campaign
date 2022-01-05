<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailSettingRequest;

class UserEmailSettingController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserEmailSetting  $userEmailSetting
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $setting = auth()->user()->emailSetting;
        return view('email-settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserEmailSetting  $userEmailSetting
     * @return \Illuminate\Http\Response
     */
    public function update(EmailSettingRequest $request)
    {
        auth()->user()->emailSetting()->update($request->validated());

        return redirect()->back()->with('success','Email setting update successfully!');
    }

}
