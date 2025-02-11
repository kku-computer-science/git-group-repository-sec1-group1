@extends('layouts.layout')
@section('content')
<div class="container card-3 ">
    <p>{{ trans('message.Research_Group') }}</p>
    @foreach ($resg as $rg)
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{asset('img/'.$rg->group_image)}}" alt="...">
                    <h2 class="card-text-1"> {{ trans('message.Lab_supervisor') }} </h2>
                    
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $r)
                             @if($r->hasRole('teacher'))
                                @php
                                    $locale = app()->getLocale();
                                    $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
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
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    @php
                        $locale = app()->getLocale();
                        $locale = in_array($locale, ['en', 'th', 'zh']) ? $locale : 'en'; // Set 'en' as default if not found
                    @endphp
                    <h5 class="card-title">{{ $rg->{'group_name_' . $locale} }}</h5>
                    <h3 class="card-text">{{ Str::limit($rg->{'group_desc_' . $locale}, 350) }}</h3>
                </div>
                <div>
                    <a href="{{ route('researchgroupdetail',['id'=>$rg->id])}}"
                        class="btn btn-outline-info">{{ trans('message.details') }}</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@stop