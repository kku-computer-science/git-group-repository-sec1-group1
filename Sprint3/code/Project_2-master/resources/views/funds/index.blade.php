@extends('dashboards.users.layouts.user-dash-layout')

<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap4.min.css">

@section('content')

<div class="container">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="card" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">{{ trans('message.research_funding') }}</h4>
            <a class="btn btn-primary btn-menu btn-icon-text btn-sm mb-3" href="{{ route('funds.create') }}"><i class="mdi mdi-plus btn-icon-prepend"></i>{{ trans('message.add') }}</a>
            <div class="table-responsive">
                <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('message.no') }}</th>
                            <th>{{ trans('message.fund_name') }}</th>
                            <th>{{ trans('message.fund_type') }}</th>
                            <th>{{ trans('message.fund_level') }}</th>
                            <!-- <th>Create by</th> -->
                            <th>{{ trans('message.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funds as $i=>$fund)
                        <tr>

                            <td>{{ $i+1 }}</td>
                            <td>{{ Str::limit($fund->fund_name,80) }}</td>
                            <td>{{ $fund->fund_type }}</td>
                            <td>{{ $fund->fund_level }}</td>
                            <!-- <td>{{ $fund->user->fname_en }} {{ $fund->user->lname_en }}</td> -->

                            <td>
                                @csrf
                                <form action="{{ route('funds.destroy',$fund->id) }}" method="POST">
                                    <li class="list-inline-item">
<<<<<<< HEAD:InitialProject/Project_2-master/storage/framework/views/b3780533ee87c9ffbf53d7b4f18dceecc3d43091.php
                                        <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('message.view')); ?>" href="<?php echo e(route('funds.show',$fund->id)); ?>"><i class="mdi mdi-eye"></i></a>
=======
                                        <a class="btn btn-outline-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="view" href="{{ route('funds.show',$fund->id) }}"><i class="mdi mdi-eye"></i></a>
>>>>>>> 3c970bd496dce06fb35ebb87c21098d1251a0559:Sprint3/code/Project_2-master/resources/views/funds/index.blade.php
                                    </li>
                                    @if(Auth::user()->can('update',$fund))
                                    <li class="list-inline-item">
<<<<<<< HEAD:InitialProject/Project_2-master/storage/framework/views/b3780533ee87c9ffbf53d7b4f18dceecc3d43091.php
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="<?php echo e(trans('message.edit')); ?>" href="<?php echo e(route('funds.edit',Crypt::encrypt($fund->id))); ?>"><i class="mdi mdi-pencil"></i></a>
=======
                                        <a class="btn btn-outline-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('funds.edit',Crypt::encrypt($fund->id)) }}"><i class="mdi mdi-pencil"></i></a>
>>>>>>> 3c970bd496dce06fb35ebb87c21098d1251a0559:Sprint3/code/Project_2-master/resources/views/funds/index.blade.php
                                    </li>
                                    @endif

                                    @if(Auth::user()->can('delete',$fund))
                                    @csrf
                                    @method('DELETE')

                                    <li class="list-inline-item">
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button class="btn btn-outline-danger btn-sm show_confirm" type="submit" data-toggle="tooltip" title="<?php echo e(trans('message.delete')); ?>"><i class="mdi mdi-delete"></i></button>
                                    </li>


                                    @endcan
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js" defer></script>
<script>
    $(document).ready(function() {
        var table = $('#example1').DataTable({
            fixedHeader: true ,
            language: {
                search: "<?php echo e(__('message.search')); ?>",
                lengthMenu: "<?php echo e(__('message.show_entries', ['entries' => '_MENU_'])); ?>",
                info: "<?php echo e(__('message.showing_entries', ['start' => '_START_', 'end' => '_END_', 'total' => '_TOTAL_'])); ?>",
                paginate: {
                    first: "<?php echo e(__('message.first')); ?>",
                    last: "<?php echo e(__('message.last')); ?>",
                    next: "<?php echo e(__('message.next')); ?>",
                    previous: "<?php echo e(__('message.previous')); ?>"
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
                title: `<?php echo e(__('message.are_you_sure')); ?>`,
                text: "<?php echo e(__('message.delete_warning')); ?>",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("<?php echo e(__('message.delete_success')); ?>", {
                        icon: "success",
                    }).then(function() {
                        location.reload();
                        form.submit();
                    });
                }
            });
    });
</script>
@endsection