@extends('layouts.layout')
<style>
    .name {

        font-size: 20px;

<<<<<<< HEAD
    .card-text-2 {
        font-size: 16px;
    }

    .no-job-openings {
        display: none;
    }

    table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        padding: 0;
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    td {
        font-size: 14px;
    }

    table th:nth-child(1),
    table td:nth-child(1) {
        width: 30%;
    }

    table th:nth-child(2),
    table td:nth-child(2),
    table th:nth-child(3),
    table td:nth-child(3),
    table th:nth-child(4),
    table td:nth-child(4) {
        width: 15%;
    }

    table th:nth-child(5),
    table td:nth-child(5),
    table th:nth-child(6),
    table td:nth-child(6) {
        width: 20%;
    }

    .card-body {
        padding-top: 0px;
    }

    .table {
        margin-top: 0px;
=======
>>>>>>> main
    }
</style>
@section('content')
<div class="container card-4 mt-5">
    <div class="card">
        @foreach ($resgd as $rg)
        <div class="row g-0">
            <div class="col-md-4">
                <div class="card-body">
                    <img src="{{asset('img/'.$rg->group_image)}}" alt="...">
                    <h1 class="card-text-1"> Laboratory Supervisor </h1>
                    <h2 class="card-text-2">
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
                    <h1 class="card-text-1"> Student </h1>
                    <h2 class="card-text-2">
                        @foreach ($rg->user as $user)
                        @if($user->hasRole('student'))
                        {{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}
                        <br>
                        @endif
                        @endforeach
                    </h2>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"> {{ $rg->{'group_name_'.app()->getLocale()} }}</>
                    </h5>
                    <h3  class="card-text">{{$rg->{'group_detail_'.app()->getLocale()} }}
                    </h3>
                </div>
<<<<<<< HEAD

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
=======
                
>>>>>>> main
            </div>
            @endforeach
            <!-- <div id="loadMore">
                <a href="#"> Load More </a>
            </div> -->
        </div>

    </div>
</div>
<<<<<<< HEAD

@if($projectApplications->isNotEmpty())
<div class="container card-4 mt-5">
    <div class="card">
        <h4 class="card-text-1">เปิดรับสมัคร</h4>
        <div class="row g-0">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ชื่อโปรเจ็ค</th>
                            <th>ตำแหน่ง</th>
                            <th>จำนวนที่รับ</th>
                            <th>เงินเดือน</th>
                            <th>สิ้นสุดวันรับสมัคร</th>
                            <th>รายละเอียด</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectApplications as $app)
                        @foreach($app->applications as $application)
                        <tr>
                            <td>{{ $app->project_title }}</td>
                            <td>{{ $application->role }}</td>
                            <td>{{ $application->amount }}</td>
                            <td>{{ $application->salary_range }}</td>
                            <td>{{ $application->end_date }}</td>
                            <td><a href="{{ route('applicationdetail', $application->id) }}">รายละเอียด</a></td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
<div class="container card-4 mt-5">
    <div class="card">
        <h4 class="card-text-1">เปิดรับสมัคร</h4>
        <div class="row g-0">
            <div class="card-body">
                <p class="no-job-openings">ไม่พบข้อมูลการรับสมัคร</p>
            </div>
        </div>
    </div>
</div>
@endif

@stop
=======
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function() {
        $(".moreBox").slice(0, 1).show();
        if ($(".blogBox:hidden").length != 0) {
            $("#loadMore").show();
        }
        $("#loadMore").on('click', function(e) {
            e.preventDefault();
            $(".moreBox:hidden").slice(0, 1).slideDown();
            if ($(".moreBox:hidden").length == 0) {
                $("#loadMore").fadeOut('slow');
            }
        });
    });
</script>

@stop
<!-- <div class="card-body-research">
                    <p>Research</p>
                    <table class="table">
                        @foreach($rg->user as $user)
                        
                        <thead>
                            <tr>
                                <th><b class="name">{{$user->{'position_'.app()->getLocale()} }} {{$user->{'fname_'.app()->getLocale()} }} {{$user->{'lname_'.app()->getLocale()} }}</b></th>
                            </tr>
                            @foreach($user->paper->sortByDesc('paper_yearpub') as $p)
                            <tr class="hidden">
                                <th>
                                    <b><math>{!! html_entity_decode(preg_replace('<inf>', 'sub', $p->paper_name)) !!}</math></b> (
                                    <link>@foreach($p->teacher as $teacher){{$teacher->fname_en}} {{$teacher->lname_en}},
                                    @endforeach
                                    @foreach($p->author as $author){{$author->author_fname}} {{$author->author_lname}}@if (!$loop->last),@endif
                                    @endforeach</link>), {{$p->paper_sourcetitle}}, {{$p->paper_volume}},
                                    {{ $p->paper_yearpub }}.
                                    <a href="{{$p->paper_url}} " target="_blank">[url]</a> <a href="https://doi.org/{{$p->paper_doi}}" target="_blank">[doi]</a>
                                </th>
                            </tr>
                            @endforeach
                        </thead>
                        @endforeach
                    </table>
                </div> -->
>>>>>>> main
