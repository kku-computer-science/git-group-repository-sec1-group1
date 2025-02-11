@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    <div class="card col-md-8" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ __('message.fund_detail') }}</h4>
            <p class="card-description">{{ __('message.fund_details_info') }}</p>

            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.fund_name_label') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_name }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.year') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_year }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.fund_details') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_details }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.fund_type_label') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_type }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.fund_level_label') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->fund_level }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.support_resource_label') }}</b></p>
                <p class="card-text col-sm-9">{{ $fund->support_resource }}</p>
            </div>
            <div class="row">
                <p class="card-text col-sm-3"><b>{{ __('message.added_by') }}</b></p>
                 @php
                    $lang = app()->getLocale();
                @endphp
                <p class="card-text col-sm-9">
                    @if ($lang === 'th')
                        {{ $fund->user->fname_th }} {{ $fund->user->lname_th }}
                    @else
                        {{ $fund->user->fname_en }} {{ $fund->user->lname_en }}
                    @endif
                </p>
            </div>

            <div class="pull-right mt-5">
                <a class="btn btn-primary btn-sm" href="{{ route('funds.index') }}">{{ __('message.back') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
