@extends('layouts.layout')    
@section('content')
<div class="container card-3">
    <p>Research Group</p>
    <div class="row g-4">
    @foreach ($resg as $rg)
    <div class="col-md-6 col-12">
        <div class="card mb-4 d-flex h-100">
            <div class="row g-0 h-100">
                <div class="col-md-4">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <img src="{{asset('img/'.$rg->group_image)}}" alt="..." class="img-fluid">
                    </div>
                </div>
                <div class="col-md-8 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <h5 class="card-title">{{ $rg->{'group_name_'.app()->getLocale()} }}</h5>
                        <h3 class="card-text">{{ Str::limit($rg->{'group_desc_'.app()->getLocale()}, 350) }}</h3>
                        <a href="{{ route('researchgroupdetail',['id'=>$rg->id])}}"
                            class="btn btn-outline-info" style="margin-bottom: -5px; margin-right: -20px;">{{ trans('message.details') }}</a>
                        <h2 class="card-text-1" style="margin-top: 20px; margin-left: -2px;">Laboratory Supervisor</h2>
                        <h2 class="card-text-2" style="margin-left: -2px;">
                            @foreach ($rg->user as $r)
                            @if($r->hasRole('teacher'))
                            @if(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer' and $r->doctoral_degree == 'Ph.D.')
                                 {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                                <br>
                            @elseif(app()->getLocale() == 'en' and $r->academic_ranks_en == 'Lecturer')
                                {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                                <br>
                            @elseif(app()->getLocale() == 'en' and $r->doctoral_degree == 'Ph.D.')
                                {{ str_replace('Dr.', ' ', $r->{'position_'.app()->getLocale()}) }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}, Ph.D.
                                <br>
                            @else
                                {{ $r->{'position_'.app()->getLocale()} }} {{ $r->{'fname_'.app()->getLocale()} }} {{ $r->{'lname_'.app()->getLocale()} }}
                                <br>
                            @endif
                            @endif
                            @endforeach
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
</div>

@stop
