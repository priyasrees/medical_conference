@extends('layouts.admin')
@section('title_bar', 'Plan')
@section('breadcrumb', 'Plan')
@section('maincontent')
<div class="content-body">
<!-- container starts -->
<div class="container-fluid">
<!-- row -->
<div class="">
    <div class="demo-view">
        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
            <div class="row">
                <!-- Column starts -->
                <div class="col-xl-12 mb-2">
                <a href="#addplan" data-bs-toggle="modal" class="btn btn-secondary " style="font-size:13px!important;"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Plan</a>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="accordion-one">
                        <div class="card-header">
                                <h4 class="card-title">Plan</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Category
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Start Date
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                No Of Days
                                            </th>
                                            <th>Plan</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if(isset($plan) && !empty($plan))
                                        @foreach($plan as $p)
                                        <tr>
                                            <td class="source"> {{$p->category}} </td>
                                            <td class="source"> {{ isset($p->start_date) && !empty($p->start_date) ? date('d M, Y',strtotime($p->start_date)) : '' }} </td>
                                            <td class="source"> {{$p->no_of_days}} </td>
                                            <td class="source"> {{  substr($p->other, 0, 30) }} ....</td>
                                            <td class="source"> {{$p->amount}}</td>
                                            <td class="source"> {{ isset($p->plan_date) && !empty($p->plan_date) ? date('d M, Y',strtotime($p->plan_date)) : '' }}</td>
                                            <td>
                                                <ul class="d-flex gap-2 list-unstyled mb-0">
                                                    <li>
                                                        <a href="javascript:void(0)" class="btn btn-secondary shadow btn-xs sharp me-1 edit" data-id="{{$p->id}}"><i class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp delete" data-id="{{ $p->id }}"><i class="fa-regular fa-trash-can"></i></a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div></div>
<div class="modal fade addplan" id="addplan" tabindex="-1" aria-labelledby="addbrandLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header  p-3">
                <h5 class="modal-title " id="addbrandLabel">Add Plan</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close" id="close-addLeadSourceLabel"></button>
            </div>
            <form class="tablelist-form" name="plan-form" id="plan-form" method="post" action="{{ url('admin/plan') }}">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Category<span class="text-danger">*</span></label>
                                <select class="form-control" name="category" id="category">
                                    <option value="">Choose Category</option>
                                    @if(isset($category) && !empty($category))
                                        @foreach($category as $c)
                                        <option value="{{$c->name}}">{{$c->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($errors->has('category'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('category') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Start Date<span class="text-danger">*</span></label>
                                <input type="date" id="start_date" name="start_date" class="form-control" placeholder="" required>
                                @if($errors->has('start_date'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('start_date') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="no_of_days" class="form-label">NO Of Days<span class="text-danger">*</span></label>
                                <input type="number" id="no_of_days" name="no_of_days" class="form-control" placeholder=" " required>
                                @if($errors->has('no_of_days'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('no_of_days') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="other" class="form-label">Plan<span class="text-danger">*</span></label>
                                <input type="text" id="other" name="other" class="form-control" placeholder="" required>
                                @if($errors->has('other'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('other') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Price<span class="text-danger">*</span></label>
                                <input type="number" id="amount" name="amount" class="form-control" placeholder=" ₹ 0" required>
                                @if($errors->has('amount'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('amount') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="date" class="form-label">Plan Date<span class="text-danger">*</span></label>
                                <input type="date" id="plan_date" name="plan_date" class="form-control" placeholder="" >
                                @if($errors->has('plan_date'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('plan_date') }}</span>@endif
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary" id="plan-submit">Save</button>
                        <button type="button" class="btn btn-ghost-danger" data-bs-dismiss="modal"><i class="bi bi-x-lg align-baseline me-1"></i> Close</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- modal-content -->
    </div>
</div>
<!--end add Property modal-->
<div id="deleteRecordModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" id="deleteRecord-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-md-5">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="bi bi-trash display-5"></i>
                    </div>
                    <div class="mt-4">
                        <h4 class="mb-2">Are you sure ?</h4>
                        <p class="text-muted mx-3 mb-0">Are you sure you want to remove this record ?</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-4 pt-2 mb-2">
                    <button type="button" class="btn w-sm btn-light btn-hover" data-bs-dismiss="modal">Close</button>
                    <form name="delete-product" id="delete-product" method="post" action="javascript:void(0)">
                        @csrf
                        <input type="hidden" name="id" id="id" value=""/>
                        <button type="submit" class="btn w-sm btn-danger btn-hover" id="delete-record">Yes, Delete
                        It!</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection
@section('footer_script')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="{{ asset('public/admin_assets/assets/js/datatables.js') }}"></script>
<script src="{{ asset('public/admin_assets/assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/admin_assets/assets/js/additional-methods.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(document).on("click","#plan-submit",function() {
            $("#plan-form").validate({
                rules: {
                    category: { required: true, minlength: 2, maxlength: 150},
                    start_date: { required: true, },
                    no_of_days: { required: true, number: true},
                    other: { required: true, minlength: 2, maxlength: 150},
                    amount: { required: true, number: true},
                    date: { required: true, },
                    
                },
                messages: {
                    title: { required: "Title is required",  },
                    start_date: { required: "Date is required",  },
                    no_of_days: { required: "no of days is required",  },
                    other: { required: "Plan is required",  },
                    amount: { required: "Price is required",  },
                    date: { required: "Date is required",  },
                },
                
                focusInvalid: true,
                invalidHandler: function () {
                    $(this).find(":input.error:first").focus();
                }
            });
            if ($("form#plan-form").valid()) {
                $("form#plan-form").submit();
            }
        });
        $(document).on("click",".edit",function() {
            let id = $(this).data('id');
            $.ajax({url: "{{ url('admin/plan') }}"+"/"+id+"/edit", success: function(result){
                $('#addplan #addbrandLabel').text('Edit Plan');
                $('#addplan #plan-submit').text('Update');    
                $('#addplan #category').val(result.plan.category).attr('selected', 'selected');
                $('#addplan #start_date').val(result.plan.start_date);
                $('#addplan #no_of_days').val(result.plan.no_of_days);
                $('#addplan #plan_date').val(result.plan.plan_date);
                $('#addplan #other').val(result.plan.other);
                $('#addplan #amount').val(result.plan.amount);
                $('#addplan #id').val(result.plan.id);
                $('.addplan').modal('show');
                //console.log('addplan');
            }});
        });
        $(document).on("click",".delete",function() {
            let id = $(this).data("id");
            $('#deleteRecordModal').modal('show');
            $('#deleteRecordModal #id').val(id);
            $('#deleteRecordModal #delete-product').attr('action', "{{ url('admin/plan/delete-record') }}");
        });
        window.setTimeout(function() {
            $(".error").text('');
            $(".error1").css('display', 'none');
        }, 6000);
        @if($errors->any())
            $('#addbrand').modal('show');
        @endif
    });
    
</script>
@endsection