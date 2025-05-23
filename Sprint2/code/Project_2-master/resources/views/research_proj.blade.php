@extends('layouts.layout')
@section('content')

<div class="container refund">
    <p>{{ __('message.academic_services') }}</p>
    

    <div class="table-refund table-responsive">
        <table id="example1" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th style="font-weight: bold;">{{ __('message.order') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ __('message.year') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ __('message.project_name') }}</th>
                    <th class="col-md-4" style="font-weight: bold;">{{ __('message.details') }}</th>
                    <th class="col-md-2" style="font-weight: bold;">{{ __('message.responsible') }}</th>
                    <th class="col-md-1" style="font-weight: bold;">{{ __('message.status') }}</th>
                </tr>
            </thead>

            
            <tbody>
                @foreach($resp as $i => $re)
                <tr>
                    <td style="vertical-align: top;text-align: left;">{{$i+1}}</td>
                    <td style="vertical-align: top;text-align: left;">{{($re->project_year)+543}}</td>
                    <td style="vertical-align: top;text-align: left;">
                        {{$re->project_name}}
                    </td>
                    <td>
                        <div style="padding-bottom: 10px">

                            @if ($re->project_start != null)
                            <span style="font-weight: bold;">
                                {{ __('message.project_duration') }}
                            </span>
                            <span style="padding-left: 10px;">
                                {{\Carbon\Carbon::parse($re->project_start)->thaidate('j F Y') }} {{ __('message.to') }} {{\Carbon\Carbon::parse($re->project_end)->thaidate('j F Y') }}
                            </span>
                            @else
                            <span style="font-weight: bold;">
                                {{ __('message.project_duration') }}
                            </span>
                            <span>
                            </span>
                            @endif
                        </div>

                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.funding_type') }}</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->fund_type}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.funding_agency') }}</span>
                            <span style="padding-left: 10px;"> @if(is_null($re->fund))
                                @else
                                {{$re->fund->support_resource}}
                                @endif</span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.responsible_department') }}</span>
                            <span style="padding-left: 10px;">
                                {{$re->responsible_department}}
                            </span>
                        </div>
                        <div style="padding-bottom: 10px;">
                            <span style="font-weight: bold;">{{ __('message.budget_allocated') }}</span>
                            <span style="padding-left: 10px;"> {{number_format($re->budget)}} {{ __('message.thai_baht') }}</span>
                        </div>
                    </td>

                    <td style="vertical-align: top;text-align: left;">
                        <div style="padding-bottom: 10px;">
                            <span>@foreach($re->user as $user) 
                            @php
                            $locale = App::getLocale(); // Get current language
                            // Check if the attribute exists, otherwise fallback to 'en'
                            $position = $user->{'position_' . $locale} ?? $user->position_en;
                            $fname = $user->{'fname_' . $locale} ?? $user->fname_en;
                            $lname = $user->{'lname_' . $locale} ?? $user->lname_en;
                        @endphp     
                        {{$position}} {{$fname}} {{$lname}}<br>
                            @endforeach</span>
                        </div>
                    </td>
                    @if($re->status == 1)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge badge-success">{{ __('message.submitted') }}</label></h6>
                    </td>
                    @elseif($re->status == 2)
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-warning text-dark">{{ __('message.in_progress') }}</label></h6>
                    </td>
                    @else
                    <td style="vertical-align: top;text-align: left;">
                        <h6><label class="badge bg-dark">{{ __('message.project_closed') }}</label></h6>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script>
    $(document).ready(function() {

        var table1 = $('#example1').DataTable({
            responsive: true,
            language: {
                search: "{{ __('message.search') }}" ,
                lengthMenu: "{{ __('message.show_entries', ['entries' => '_MENU_']) }}"
            }
        });
    });
</script>
@stop
