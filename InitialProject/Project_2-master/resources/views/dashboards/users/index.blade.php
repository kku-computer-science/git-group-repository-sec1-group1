@extends('dashboards.users.layouts.user-dash-layout')
@section('title','Dashboard')

@section('content')

<h3 style="padding-top: 10px;">{{ __('message.welcome_message') }}</h3>
<br>
<h4>
    {{ __('message.hello') }} 
    {{ 
        App::getLocale() == 'cn' 
        ? Auth::user()->{'position_en'} 
        : Auth::user()->{'position_' . App::getLocale()} 
    }} 
    {{ 
        App::getLocale() == 'cn' 
        ? Auth::user()->{'fname_en'} 
        : Auth::user()->{'fname_' . App::getLocale()} 
    }} 
    {{ 
        App::getLocale() == 'cn' 
        ? Auth::user()->{'lname_en'} 
        : Auth::user()->{'lname_' . App::getLocale()} 
    }}
</h4>

@endsection

