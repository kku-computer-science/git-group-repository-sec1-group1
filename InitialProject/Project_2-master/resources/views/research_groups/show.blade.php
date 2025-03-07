@extends('dashboards.users.layouts.user-dash-layout')

@section('content')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card col-md-10" style="padding: 16px;">
        <div class="card-body">
            <h4 class="card-title">รายละเอียดกลุ่มวิจัย</h4>
            <p class="card-description">ข้อมูลรายละเอียดกลุ่มวิจัย</p>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>ชื่อกลุ่มวิจัย (ภาษาไทย)</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_th }}</p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>ชื่อกลุ่มวิจัย (English)</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_name_en }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>คำอธิบายกลุ่มวิจัย (ภาษาไทย)</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_th }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>คำอธิบายกลุ่มวิจัย (English)</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_desc_en }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>รายละเอียดกลุ่มวิจัย (ภาษาไทย)</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_th }}</p>
            </div>
            <div class="row mt-2">
                <p class="card-text col-sm-3"><b>รายละเอียดกลุ่มวิจัย (English)</b></p>
                <p class="card-text col-sm-9">{{ $researchGroup->group_detail_en }}</p>
            </div>
            <div class="row mt-3">
                <p class="card-text col-sm-3"><b>หัวหน้ากลุ่มวิจัย</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                    @if ( $user->pivot->role == 1)
                    {{$user->position_th}}{{ $user->fname_th}} {{ $user->lname_th}}
                    @endif
                    @endforeach
                </p>
            </div>
            <div class="row mt-1">
                <p class="card-text col-sm-3"><b>สมาชิกกลุ่มวิจัย</b></p>
                <p class="card-text col-sm-9">
                    @foreach($researchGroup->user as $user)
                    @if ( $user->pivot->role == 2)
                    {{$user->position_th}}{{ $user->fname_th}} {{ $user->lname_th}},
                    @endif
                    @endforeach
                </p>
            </div>

            <!-- ปุ่มเปิด Modal -->
            @if(Auth::user()->can('update',$researchGroup))
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addResearchModal">
                เพิ่มงานวิจัยที่เกี่ยวข้อง
            </button>
            @endif

            <!-- Modal -->
            <div class="modal fade" id="addResearchModal" tabindex="-1" role="dialog" aria-labelledby="addResearchModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addResearchModalLabel">เพิ่มงานวิจัยที่เกี่ยวข้อง</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="addResearchForm" action="{{ route('relatedResearch.store', ['id' => $researchGroup->id]) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label><b>ชื่องานวิจัย</b></label>
                                    <input name="re_title" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><b>คำอธิบาย</b></label>
                                    <textarea name="re_desc" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label><b>วันที่ตีพิมพ์</b></label>
                                    <input type="date" name="public_date" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><b>URL</b></label>
                                    <input type="text" name="source_url" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label><b>ประเภทของเอกสาร</b></label>
                                    <select class="custom-select" name="re_type">
                                        <option value="Journal">Journal</option>
                                        <option value="Conference Proceeding">Conference Proceeding</option>
                                        <option value="Book Series">Book Series</option>
                                        <option value="Book">Book</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label><b>สมาชิกกลุ่มวิจัย</b></label>
                                    <select class="form-control user-select" name="user_ids[]" multiple="multiple">
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="and_author" value="1"> และคณะ
                                    </label>
                                </div>
                                <input type="hidden" name="re_group_id" value="{{ $researchGroup->id }}">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary" form="addResearchForm">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- แสดงผลงานวิจัยที่เกี่ยวข้อง -->
            <div class="form-group row mt-4">
                <p class="col-sm-3 pt-4"><b>งานวิจัยที่เกี่ยวข้อง</b></p>
                <div class="col-sm-8">
                    <ul style="list-style: none; padding: 0;">
                        @foreach ($relatedResearch->sortByDesc('public_date') as $research)
                        <li style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #ddd; padding: 10px 0;">
                            <div>
                                [<strong>{{ $research->re_type }}</strong>]
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
                                    {{ $research->public_date }} |
                                    <a href="{{ $research->source_url }}" target="_blank">[url]</a>
                                </span>
                            </div>
                            @if(Auth::user()->can('update',$researchGroup))
                            <!-- ปุ่มลบ -->
                            <form action="{{ route('relatedResearch.destroy', ['id' => $researchGroup->id, 'relatedResearchId' => $research->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">ลบ</button>
                            </form>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <a class="btn btn-primary mt-5" href="{{ route('researchGroups.index') }}"> Back</a>
        </div>
    </div>

    <style>
        /* Fix for Select2 in Bootstrap modal */
        .select2-container--default .select2-selection--multiple {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 5px;
        }

        /* Ensure Select2 dropdown appears above modal */
        .select2-container--open {
            z-index: 9999;
        }

        /* Fix for Select2 search box width */
        .select2-search__field {
            width: 100% !important;
        }

        /* Make dropdown match width of select box */
        .select2-container {
            width: 100% !important;
        }
    </style>
@stop

@section('javascript')
<script>
    $(document).ready(function() {
        // Initialize Select2 with proper dropdown parent
        $('.user-select').select2({
            placeholder: "เลือกผู้ใช้",
            allowClear: true,
            dropdownParent: $("#addResearchModal")
        });
        
        // Reset form when modal is closed
        $('#addResearchModal').on('hidden.bs.modal', function() {
            $('#addResearchForm').trigger('reset');
            $('.user-select').val(null).trigger('change');
        });

        /* When click New customer button */
        $('#new-customer').click(function() {
            $('#btn-save').val("create-customer");
            $('#customer').trigger("reset");
            $('#customerCrudModal').html("Add New Customer EiEi");
            $('#crud-modal').modal('show');
        });
        
        /* When click New customer button */
        $('#new-customer2').click(function() {
            $('#btn-save').val("create-customer");
            $('#customer').trigger("reset");
            $('#customerCrudModal').html("Add New Customer EiEi");
            $('#crud-modal').modal('show');
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        let addButton = document.getElementById("add-btn2");
        if (addButton) {
            let userTableBody = document.getElementById("userTableBody");

            // ฟังก์ชันตรวจสอบค่าที่ซ้ำกัน
            function checkDuplicateSelections() {
                let selects = userTableBody.querySelectorAll('select[name="user_ids[]"]');
                let selectedValues = new Set();

                selects.forEach(select => {
                    Array.from(select.selectedOptions).forEach(option => {
                        if (selectedValues.has(option.value)) {
                            alert("ไม่สามารถเลือกสมาชิกซ้ำกันได้");
                            option.selected = false; // ยกเลิกการเลือก
                        } else {
                            selectedValues.add(option.value);
                        }
                    });
                });
            }

            // เพิ่ม Event Listener ให้กับ select ทุกตัว
            function addSelectChangeListener(select) {
                select.addEventListener("change", function() {
                    checkDuplicateSelections();
                });
            }

            // เพิ่มแถวใหม่
            addButton.addEventListener("click", function() {
                let newRow = document.createElement("tr");
                newRow.innerHTML = `
                    <td>
                        <select class="form-control user-select" name="user_ids[]" multiple="multiple">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->fname_th }} {{ $user->lname_th }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-btn">ลบ</button>
                    </td>
                `;

                userTableBody.appendChild(newRow);

                // เรียกใช้ Select2 สำหรับ select ใหม่
                $(newRow.querySelector('.user-select')).select2({
                    placeholder: "เลือกสมาชิก",
                    allowClear: true
                });

                // เพิ่ม Event Listener ให้กับ select ใหม่
                let newSelect = newRow.querySelector('select[name="user_ids[]"]');
                addSelectChangeListener(newSelect);

                // เพิ่ม Event ให้ปุ่มลบ
                newRow.querySelector(".remove-btn").addEventListener("click", function() {
                    userTableBody.removeChild(newRow);
                    checkDuplicateSelections(); // ตรวจสอบค่าที่ซ้ำกันอีกครั้งหลังจากลบแถว
                });
            });

            // เพิ่ม Event Listener ให้กับ select ที่มีอยู่แล้ว
            let existingSelects = userTableBody.querySelectorAll('select[name="user_ids[]"]');
            existingSelects.forEach(select => {
                $(select).select2({
                    placeholder: "เลือกสมาชิก",
                    allowClear: true
                });
                addSelectChangeListener(select);
            });
        }
    });
</script>
@stop