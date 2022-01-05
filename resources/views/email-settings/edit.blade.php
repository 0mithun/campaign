@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">{{ __('Update Email Setting') }}</div>
            <div class="card-body">
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('email.setting.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="mail_host" class="col-md-2 col-form-label text-md-end">{{ __('Mail Host') }}</label>
                        <div class="col-md-8">
                            <input id="mail_host" type="text" class="form-control @error('mail_host') is-invalid @enderror" name="mail_host" value="{{ $setting->mail_host }}" autofocus>
                            @error('mail_host')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mail_port" class="col-md-2 col-form-label text-md-end">{{ __('Mail Port') }}</label>
                        <div class="col-md-8">
                            <input id="mail_port" type="number" class="form-control @error('mail_port') is-invalid @enderror" name="mail_port" value="{{ $setting->mail_port }}" autofocus>
                            @error('mail_port')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mail_username" class="col-md-2 col-form-label text-md-end">{{ __('Mail Username') }}</label>
                        <div class="col-md-8">
                            <input id="mail_username" type="text" class="form-control @error('mail_username') is-invalid @enderror" name="mail_username" value="{{ $setting->mail_username }}" autofocus>
                            @error('mail_username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mail_password" class="col-md-2 col-form-label text-md-end">{{ __('Mail Password') }}</label>
                        <div class="col-md-8">
                            <input id="mail_password" type="text" class="form-control @error('mail_password') is-invalid @enderror" name="mail_password" value="{{ $setting->mail_password }}" autofocus>
                            @error('mail_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mail_encryption" class="col-md-2 col-form-label text-md-end">{{ __('Mail Encryption') }}</label>
                        <div class="col-md-8">
                            <input id="mail_encryption" type="text" class="form-control @error('mail_encryption') is-invalid @enderror" name="mail_encryption" value="{{ $setting->mail_encryption }}" autofocus>
                            @error('mail_encryption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-8 offset-md-2">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Setting') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
