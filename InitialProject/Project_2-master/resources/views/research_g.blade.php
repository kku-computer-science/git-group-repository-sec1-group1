@extends('layouts.layout')

@section('content')
<div class="container card-3">
    <p>Research Group</p>
    <div class="row g-5">
        @foreach ($resg as $rg)
        @php
            $hasApplications = $rg->projectApplications->isNotEmpty();
        @endphp
        <div class="col-md-6">
            @if ($hasApplications)
            <label class="badge p-2" style="background-color: #17a2b8; color: white; font-weight: bold; margin-bottom: 0;">
                เปิดรับสมัคร
            </label>
            @else
            <label class="badge p-2" style="background-color: rgb(255, 255, 255); color: white; font-weight: bold; margin-bottom: 0;">
            </label>
            @endif 
            <div class="card mb-4 d-flex flex-column h-100 shadow-sm">
                <div class="row g-0 flex-grow-1">
                    <div class="col-md-4">
                        <div class="card-body p-2">
                            <img src="{{ asset('img/'.$rg->group_image) }}" alt="..." class="img-fluid ml-0">
                        </div>
                    </div>
                    <div class="col-md-8 d-flex flex-column">
                        <div class="card-body flex-grow-1 d-flex flex-column">
                            @php
                            $locale = app()->getLocale();
                            $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en';
                            @endphp
                            <h5 class="card-title">{{ $rg->{'group_name_' . $locale} }}</h5>
                            <h3 class="card-text">{{ Str::limit($rg->{'group_desc_' . $locale}, 350) }}</h3>

                            <h2 class="card-text-1 mt-3 ml-0">{{ trans('message.Lab_supervisor') }}</h2>
                            <h2 class="card-text-2 ml-0">
                                @foreach ($rg->user as $r)
                                @if($r->hasRole('teacher'))
                                @php
                                $locale = app()->getLocale();
                                $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en';
                                @endphp
                                @if($locale == 'en' && $r->academic_ranks_en == 'Lecturer' && $r->doctoral_degree == 'Ph.D.')
                                {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}, Ph.D.
                                <br>
                                @elseif($locale == 'en' && $r->academic_ranks_en == 'Lecturer')
                                {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}
                                <br>
                                @elseif($locale == 'en' && $r->doctoral_degree == 'Ph.D.')
                                {{ str_replace('Dr.', ' ', $r->{'position_' . $locale}) }} {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}, Ph.D.
                                <br>
                                @else
                                {{ $r->{'position_' . $locale} }} {{ $r->{'fname_' . $locale} }} {{ $r->{'lname_' . $locale} }}
                                <br>
                                @endif
                                @endif
                                @endforeach
                            </h2>

                            <div class="mt-auto">
                                <a href="{{ route('researchgroupdetail', ['id' => $rg->id]) }}" class="btn btn-outline-info ">{{ trans('message.details') }}</a>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop
