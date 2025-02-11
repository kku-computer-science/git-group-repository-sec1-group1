@extends('layouts.layout')

<style>
    .name {
        font-size: 20px;
    }
    .card-text-1 {
        font-weight: bold;
    }
    .card-text-2 {
        font-size: 16px;
    }
</style>

@section('content')
<div class="container card-4 mt-5">
    <div class="card">
        @foreach ($resgd as $rg)
        <div class="row g-0 shadow-sm">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{ asset('img/'.$rg->group_image) }}" alt="..." class="img-fluid">
                    <h1 class="card-text-1">Laboratory Supervisor</h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                            @if($r->hasRole('teacher'))
                                @php
                                $locale = app()->getLocale();
                                $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                                @endphp
                                @if($locale == 'en' && $r->academic_ranks_en == 'Lecturer' && $r->doctoral_degree == 'Ph.D.')
                                    <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                                        {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}, Ph.D.
                                    </a><br>
                                @elseif($locale == 'en' && $r->academic_ranks_en == 'Lecturer')
                                    <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                                        {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}
                                    </a><br>
                                @elseif($locale == 'en' && $r->doctoral_degree == 'Ph.D.')
                                    <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                                        {{ str_replace('Dr.', ' ', $r->{'position_' . $locale}) }} {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}, Ph.D.
                                    </a><br>
                                @else
                                    {{ $r->{'position_' . $locale} }} {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}<br>
                                @endif
                            @endif
                        @endforeach
                    </h2>
                    @if(collect($rg->user)->contains(fn($user) => $user->hasRole('student')))
                        <h1 class="card-text-1">Student</h1>
                        <h2 class="card-text-2">
                            @foreach ($rg->user as $user)
                                @if($user->hasRole('student'))
                                    {{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}
                                    <br>
                                @endif
                            @endforeach
                        </h2>
                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        @php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        @endphp
                        {{ $rg->{'group_name_' . $locale} }}
                    </h5>
                    <h3 class="card-text">
                        {{ Str::limit($rg->{'group_desc_' . $locale}, 350) }}
                    </h3>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
