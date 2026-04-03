@extends('layouts.admin')
@section('title_bar', 'Package')
@section('breadcrumb', 'Package')
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
                <div class="col-xl-12 mb-2"><a href="#addpackage" data-bs-toggle="modal" class="btn btn-secondary " style="float:right;font-size:13px!important;"><i class="bi bi-plus-circle align-baseline me-1"></i> Add Package</a></div>
                <div class="col-xl-12">
                    
                    <div class="card" id="accordion-one">
                        <div class="card-header">
                            Package
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Title
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Start Date
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                No Of Days
                                            </th>
                                            <th>Single Bed</th>
                                            <th>Double Bed</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @if(isset($package) && !empty($package))
                                        @foreach($package as $p)
                                        <tr>
                                            <td class="source"> {{$p->title}} </td>
                                            <td class="source"> {{ isset($p->start_date) && !empty($p->start_date) ? date('d M, Y',strtotime($p->start_date)) : '' }} </td>
                                            <td class="source"> {{$p->no_of_days}} </td>
                                            <td class="source"> {{$p->single_bed}}<br/> Amount - ₹ {{$p->single_bed_price}}</td>
                                            <td class="source"> {{$p->double_bed}}<br/> Amount - ₹ {{$p->double_bed_price}}</td>
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
<div class="modal fade addpackage" id="addpackage" tabindex="-1" aria-labelledby="addbrandLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-0">
            <div class="modal-header  p-3">
                <h5 class="modal-title " id="addbrandLabel">Add Package</h5>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close" id="close-addLeadSourceLabel"></button>
            </div>
            <form class="tablelist-form" name="package-form" id="package-form" method="post" action="{{ url('admin/package') }}">
                @csrf
                <input type="hidden" name="id" id="id" value="">
                <div class="modal-body">
                    <div id="alert-error-msg" class="d-none alert alert-danger py-2"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" required>
                                @if($errors->has('title'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('title') }}</span>@endif
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
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="single_bed" class="form-label">Single Bed Room<span class="text-danger">*</span></label>
                                <input type="text" id="single_bed" name="single_bed" class="form-control" placeholder="" required>
                                @if($errors->has('single_bed'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('single_bed') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="single_bed_price" class="form-label">Single Bed Room Price<span class="text-danger">*</span></label>
                                <input type="text" id="single_bed_price" name="single_bed_price" class="form-control" placeholder=" ₹0" required>
                                @if($errors->has('single_bed_price'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('single_bed_price') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="double_bed" class="form-label">Double Bed Room<span class="text-danger">*</span></label>
                                <input type="text" id="double_bed" name="double_bed" class="form-control" placeholder="" required>
                                @if($errors->has('double_bed'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('double_bed') }}</span>@endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="double_bed_price" class="form-label">Double Bed Room Price<span class="text-danger">*</span></label>
                                <input type="text" id="double_bed_price" name="double_bed_price" class="form-control" placeholder=" ₹0" required>
                                @if($errors->has('double_bed_price'))<span class="error fw-normal" style="color: red!important;font-size:12px;">{{ $errors->first('double_bed_price') }}</span>@endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="hstack gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary" id="package-submit">Save</button>
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
        $(document).on("click","#package-submit",function() {
            $("#package-form").validate({
                rules: {
                    title: { required: true, minlength: 2, maxlength: 150},
                    start_date: { required: true, },
                    no_of_days: { required: true, number: true},
                    single_bed: { required: true, minlength: 2, maxlength: 150},
                    single_bed_price: { required: true, number: true},
                    double_bed: { required: true, minlength: 2, maxlength: 150},
                    double_bed_price: { required: true, number: true},
                },
                messages: {
                    title: { required: "Title is required",  },
                    start_date: { required: "Date is required",  },
                    no_of_days: { required: "no of days is required",  },
                    single_bed: { required: "Single Bed is required",  },
                    single_bed_price: { required: "Price is required",  },
                    double_bed: { required: "double bed is required",  },
                    single_bed_price: { required: "price is required",  },
                },
                
                focusInvalid: true,
                invalidHandler: function () {
                    $(this).find(":input.error:first").focus();
                }
            });
            if ($("form#package-form").valid()) {
                $("form#package-form").submit();
            }
        });
        $(document).on("click",".edit",function() {
            let id = $(this).data('id');
            $.ajax({url: "{{ url('admin/package') }}"+"/"+id+"/edit", success: function(result){
                $('#addpackage #addbrandLabel').text('Edit Package');
                $('#addpackage #package-submit').text('Update');    
                $('#addpackage #title').val(result.package.title);
                $('#addpackage #start_date').val(result.package.start_date);
                $('#addpackage #no_of_days').val(result.package.no_of_days);
                $('#addpackage #single_bed').val(result.package.single_bed);
                $('#addpackage #single_bed_price').val(result.package.single_bed_price);
                $('#addpackage #double_bed').val(result.package.double_bed);
                $('#addpackage #double_bed_price').val(result.package.double_bed_price);
                $('#addpackage #id').val(result.package.id);
                $('.addpackage').modal('show');
                console.log('addpackage');
            }});
        });
        $(document).on("click",".delete",function() {
            let id = $(this).data("id");
            $('#deleteRecordModal').modal('show');
            $('#deleteRecordModal #id').val(id);
            $('#deleteRecordModal #delete-product').attr('action', "{{ url('admin/package/delete-record') }}");
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