@extends('dashboards.users.layouts.user-dash-layout')
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
@section('title','Project')

@section('content')

<div class="container">

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.ResearchProj') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('researchProjects.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i> {{ trans('message.add') }}</a>
            <!-- <div class="table-responsive"> -->
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('message.no') }}</th>
                            <th>{{ trans('message.year') }}</th>
                            <th>{{ trans('message.project_name') }}</th>
                            <th>{{ trans('message.head') }}</th>
                            <th>{{ trans('message.member') }}</th>
                            <th width="auto">{{ trans('message.action') }}</th>
                        </tr>
                        <thead>
                        <tbody>
                            @foreach ($researchProjects as $i=>$researchProject)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $researchProject->project_year }}</td>
                                {{-- <td>{{ $researchProject->project_name }}</td> --}}
                                <td>{{ Str::limit($researchProject->project_name,70) }}</td>
                                <td>
                                    @foreach($researchProject->user as $user)
                                    @if ( $user->pivot->role == 1)
                                    {{ $user->{'fname_' . app()->getLocale()} }}
                                    @endif

                                    @endforeach
                                </td>
                                <td>
                                    @foreach($researchProject->user as $user)
                                    @if ( $user->pivot->role == 2)
                                    {{ $user->{'fname_' . app()->getLocale()} }}
                                    @endif

                                    @endforeach
                                </td>
                                <td>
                                    <form action="{{ route('researchProjects.destroy',$researchProject->id) }}"method="POST">
                                    <li class="list-inline-item">
                                    <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip"
                                            data-placement="top" title="{{ trans('message.view') }}"
                                            href="{{ route('researchProjects.show',$researchProject->id) }}"><i
                                                class="mdi mdi-eye"></i></a>
                                    </li>
                                        <!-- @if(Auth::user()->can('update',$researchProject))
                                <a class="btn btn-primary"
                                    href="{{ route('researchProjects.edit',$researchProject->id) }}">Edit</a>
                                @endif -->
                               
                                        @if(Auth::user()->can('update',$researchProject)) 
                                        <li class="list-inline-item">
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip"
                                            data-placement="top" title="{{ trans('message.edit') }}"
                                            href="{{ route('researchProjects.edit',$researchProject->id) }}"><i
                                                class="mdi mdi-pencil"></i></a>
                                             </li>
                                        @endif
                               
                                        @if(Auth::user()->can('delete',$researchProject))
                                        @csrf
                                        @method('DELETE')

                                        <li class="list-inline-item">
                                            <button class="btn btn-outline-danger btn-sm show_confirm" type="submit"
                                                data-toggle="tooltip" data-placement="top" title="{{ trans('message.delete') }}"><i
                                                    class="mdi mdi-delete"></i></button>
                                        </li>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    <tbody>
                        
                </table>
            <!-- </div> -->
            <br>
            
        </div>
    </div>
    

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src = "https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer ></script>
<script src = "https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer ></script>
<script>
    $(document).ready(function() {
        var table1 = $('#example1').DataTable({
            responsive: true,
            language: {
                search: "{{ __('message.search') }}",
                lengthMenu: "{{ __('message.show_entries', ['entries' => '_MENU_']) }}",
                info: "{{ __('message.showing_entries', ['start' => '_START_', 'end' => '_END_', 'total' => '_TOTAL_']) }}",
                paginate: {
                    first: "{{ __('message.first') }}",
                    last: "{{ __('message.last') }}",
                    next: "{{ __('message.next') }}",
                    previous: "{{ __('message.previous') }}"
                }
            }
        });
    });
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `{{ __('message.are_you_sure') }}`,
                text: "{{ __('message.delete_warning') }}",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("{{ __('message.delete_success') }}", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
@stop