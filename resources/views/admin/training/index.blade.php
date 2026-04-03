@extends('layouts.admin')
@section('title_bar', 'Hands on Training Courses')
@section('breadcrumb', 'Hands on Training Courses')
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
                <a href="#addtraining"  data-bs-toggle="modal" class="btn btn-secondary addtraining59641" style="float:right;font-size:13px!important;"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Hands on Training Courses</a>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="accordion-one">
                        <div class="card-header">
                                <h4 class="card-title">Hands on Training Courses</h4>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                S.no
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Training
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Price
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                USD Price
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Total User
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Total Join User
                                            </th>
                                            <th>Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if(isset($training) && !empty($training))
                                        @foreach($training as $key=>$d)
                                        <tr>
                                            <td class="source"> {{$key+1}}</td>
                                            <td class="source"> {{$d->text}}</td>
                                            <td class="source"> {{$d->price}}</td>
                                            <td class="source"> {{$d->usd_price}}</td>
                                            <td class="source"> {{$d->user}} </td>
                                            <td class="source"> {{$d->join_user}}</td>
                                            <td class="source"> {{ isset($d->created_at) && !empty($d->created_at) ? date('d M, Y h:i a',strtotime($d->created_at)) : '' }}</td>
                                            <td>
                                                <ul class="d-flex gap-2 list-unstyled mb-0">
                                                    <li>
                                                        <a href="javascript:void(0)" class="btn btn-secondary shadow btn-xs sharp me-1 edit" data-id="{{$d->id}}"><i class="fa fa-edit"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp delete" data-id="{{ $d->id }}"><i class="fa-regular fa-trash-can"></i></a>
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
<div class="modal fade addtraining" id="addtraining" tabindex="-1" aria-labelledby="addbrandLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header  p-3">
                <h5 class="modal-title " id="addbrandLabel">Add Hands on Training Courses</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close" id="close-addLeadSourceLabel"></button>
            </div>
            <form class="tablelist-form" name="training-form" id="training-form" method="post" action="{{ url('admin/training') }}">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="text" class="form-label">Training<span class="text-danger">*</span></label>
                                <input type="text" name="text" id="text" class="form-control" value="" required="">
                                @if($errors->has('text'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('text') }}</span>@endif
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control" value="" required>
                                @if($errors->has('price'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('price') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="usd_price" class="form-label">USD Price<span class="text-danger">*</span></label>
                                <input type="number" name="usd_price" id="usd_price" class="form-control" value="" required>
                                @if($errors->has('usd_price'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('usd_price') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="user" class="form-label">Maximum  User Training<span class="text-danger">*</span></label>
                                <input type="number" id="user" name="user" class="form-control" placeholder="" required>
                                @if($errors->has('user'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('user') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="join_user" class="form-label">Maximum  User Join<span class="text-danger">*</span></label>
                                <input type="number" id="join_user" name="join_user" class="form-control" placeholder="" required>
                                @if($errors->has('join_user'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('join_user') }}</span>@endif
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary" id="training-submit">Save</button>
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
<!--<script src="{{ asset('public/admin_assets/assets/js/datatables.js') }}"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/additional-methods.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on("click","#training-submit",function() {
            $("#training-form").validate({
                rules: {
                    text: { required: true, minlength: 1, maxlength: 150},
                    price: { required: true, number:true },
                    usd_price: { required: true, number:true },
                    user: { required: true, number: true},
                    join_user: { required: true, number: true},
                },
                messages: {
                    text: { required: "text is required",  },
                    price: { required: "Price is required",  },
                    usd_price: { required: "USD Price is required",  },
                    user: { required: "Total User is required",  },
                    join_user: { required: "Total Join User is required",  },
                },
                focusInvalid: true,
                invalidHandler: function () {
                    $(this).find(":input.error:first").focus();
                }
            });
            if ($("form#training-form").valid()) {
                $("form#training-form").submit();
            }
        });
        $(document).on("click",".addtraining59641",function() {
            //let id = $(this).data('id');
            //$.ajax({url: "{{ url('admin/training') }}"+"/"+id+"/edit", success: function(result){
                $('#addtraining #addbrandLabel').text('Add Hands on Training Courses');
                $('#addtraining #training-submit').text('Save');    
                $('#addtraining #start_date').val('');
                $('#addtraining #no_of_days').val('');
                $('#addtraining #usd_price').val('');
                $('#addtraining #price').val('');
                $('#addtraining #text').val('');
                $('#addtraining #id').val('');
                $('.addtraining').modal('show');
                //console.log('addtraining');
            //}});
        });
        $(document).on("click",".edit",function() {
            let id = $(this).data('id');
            $.ajax({url: "{{ url('admin/training') }}"+"/"+id+"/edit", success: function(result){
                $('#addtraining #addbrandLabel').text('Edit Hands on Training Courses');
                $('#addtraining #training-submit').text('Update');    
                $('#addtraining #join_user').val(result.training.join_user);
                $('#addtraining #user').val(result.training.user);
                $('#addtraining #usd_price').val(result.training.usd_price);
                $('#addtraining #price').val(result.training.price);
                $('#addtraining #text').val(result.training.text);
                $('#addtraining #id').val(result.training.id);
                
                $('.addtraining').modal('show');
                //console.log('addtraining');
            }});
        });
        $(document).on("click",".delete",function() {
            let id = $(this).data("id");
            $('#deleteRecordModal').modal('show');
            $('#deleteRecordModal #id').val(id);
            $('#deleteRecordModal #delete-product').attr('action', "{{ url('admin/training/delete-record') }}");
        });
        window.setTimeout(function() {
            $(".error").text('');
            $(".error1").css('display', 'none');
        }, 6000);
        @if($errors->any())
            $('#addtraining').modal('show');
        @endif
    });
    
</script>
@endsection