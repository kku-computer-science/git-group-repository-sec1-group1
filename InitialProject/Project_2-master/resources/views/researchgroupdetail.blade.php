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
                    <h1 class="card-text-1">{{ trans('message.Lab_supervisor') }}</h1>
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
                        @elseif($locale == 'th' && isset($r->{'fname_th'}) && isset($r->{'lname_th'}))
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ $r->{'fname_th'} }} {{ $r->{'lname_th'} }}
                        </a><br>
                        @elseif($locale == 'th' && isset($r->{'fname_th'}) && isset($r->{'lname_th'}) && isset($r->{'position_th'}))
                        <a href="{{ route('detail', Crypt::encrypt($r->id)) }}">
                            {{ $r->{'position_th'} }} {{ $r->{'fname_th'} }} {{ $r->{'lname_th'} }}
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
                        @php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                        @endphp
                        {{ $user->{'position_' . $locale} }} {{ $user->{'fname_' . $locale} }} {{ $user->{'lname_' . $locale} }}
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

                <div class="card-body">
                    <h5 class="card-title">งานวิจัยที่เกี่ยวข้อง</h5>
                        <ul>
                        <h3 class="card-text">
                        @foreach ($relatedResearch->sortByDesc('public_date') as $research)
    <li>
        <strong>[{{ $research->re_type }}]</strong>
        <strong>{{ $research->re_title }}</strong><br>
        <span style="margin-left: 20px;">
            @php
                $userNames = $research->users->map(fn($user) => $user->fname_en . ' ' . $user->lname_en)->join(', ');
            @endphp
            {{ $userNames ?: 'ไม่ระบุ' }}
            @if ($research->and_author == 1)
                <span> และคณะ</span>
            @endif
        </span><br>

        <span style="margin-left: 20px;">{{ $research->re_desc }}</span><br>
        <span style="margin-left: 20px;">
            <em>{{ $research->public_date }}</em> | 
            <a href="{{ $research->source_url }}" target="_blank">[url]</a>
        </span>
    </li>
@endforeach

                        </h3>
                        <div class="pagination">
                            {{ $relatedResearch->links() }}
                        </div>
                        </ul>
                    </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop