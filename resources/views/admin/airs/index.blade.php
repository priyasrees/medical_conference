@extends('layouts.admin')
@section('title_bar', 'Airs Members')
@section('breadcrumb', 'Airs Members')
@section('maincontent')
<style>
    a{
        text-decoration: none!important;
    }
    .text-primary.font-w600{
        color: #AD0E60 !important;
    }
     .btn-primary
    {
    color: #f4eaef !important;
    background-color: #AD0E60 !important;
    border-color: #b71b6b !important;
    }
      .btn-dark
    {
    color: #f4eaef !important;
    background-color: #303972 !important;
    border-color: #303972 !important;
    }
      .btn-secondary
    {
    color: #f4eaef !important;
    background-color: #FB7D5B !important;
    border-color: #FB7D5B !important;
    }
</style>
<div class="content-body">
<!-- container starts -->
<div class="container-fluid">
<form name="search" id="search" method="get" action="javascript:void(0)" >
<div class="card">
    <div class="card-body">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-4">
                            <label for="from_date">From</label>
                            <input type="date" name="from_date" id="from_date" class="form-control" value="{{ isset($_GET['from_date']) && !empty($_GET['from_date']) ? $_GET['from_date'] : '' }}"/>
                        </div>
                        <div class="col-lg-4">
                            <label for="to_date">TO</label>
                            <input type="date" name="to_date" id="to_date" class="form-control" value="{{ isset($_GET['to_date']) && !empty($_GET['to_date']) ? $_GET['to_date'] : '' }}"/>
                        </div>
                        <div class="col-lg-4 mt-4">
                            <select name="option" id="option" class="form-control">
                            <option value="">Excel Option Export</option>
                            <option value="all" selected="" @if(isset($_GET['option']) && !empty($_GET['option']) && $_GET['option'] == 'all') selected @endif>All</option>
                            <option value="1" @if(isset($_GET['option']) && !empty($_GET['option']) && $_GET['option'] == 1) selected @endif>Gala Dinner</option>
                            <option value="2" @if(isset($_GET['option']) && !empty($_GET['option']) && $_GET['option'] == 2) selected @endif>Residential Package</option>
                            <option value="3" @if(isset($_GET['option']) && !empty($_GET['option']) && $_GET['option'] == 3) selected @endif>Hands on Training Courses</option>
                            <option value="4" @if(isset($_GET['option']) && !empty($_GET['option']) && $_GET['option'] == 4) selected @endif>Become an AIRS Member</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row mt-4">
                        <div class="col-lg-1" style="padding:0px 5px 0px 5px;">
                            <button class="btn btn-primary" id="search-btn"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="col-lg-1" style="padding:0px 15px 0px 15px;">
                            <a class="btn btn-dark" href="{{ url('admin/airs-members') }}"><i class="fa fa-refresh"></i></a>
                        </div>
                        <div class="col-lg-1" style="padding:0px 25px 0px 25px;">
                            <button class="btn btn-success" id="export-btn"><i class="fa-regular fa-file-excel"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form><!-- row -->
<div class="">
    <div class="demo-view">
        <div class="container">
            <div class="row">
                <!-- Column starts -->
                <div class="col-xl-12">
                    <div class="card" id="accordion-one">
                        <div class="card-header flex-wrap px-3">
                            <div>
                                <h4 class="card-title">Airs Member</h4>
                            </div>
                        </div>
                        <!--tab-content-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example1" class="table w-100">
                                    <thead>
                                        <tr>
                                            <th>Membership ID</th>
                                            <th>Name</th>
                                            <th style="display:none;">Raw Date</th>
                                            <th>Date</th>
                                            <th>Mobile Number</th>
                                            <th>City</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($members) && !empty($members))
                                        @foreach($members as $m)
                                        <tr>
                                            <td><a href="{{ url('admin/airs-members/detail') }}{{ '/'.$m->id }}"><span class="text-primary font-w600">{{ isset($m->membership_no) && !empty($m->membership_no) ? 'RHIN'.'0000'.$m->id : 'RHIN'.'0000'.$m->id }}</span></a></td>
                                            <td>{{ $m->name }}</td>
                                            <td style="display:none;">{{ $m->created_at }}</td>
                                            <td>{{ isset($m->created_at) && !empty($m->created_at) ? date('M d, Y',strtotime($m->created_at)) : '--' }}</td>
                                            <td>{{ $m->code.' '.$m->mobile }}</td>
                                            <td>{{ $m->city }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ url('admin/airs-members/detail') }}{{ '/'.$m->id }}" data-id="{{ $m->id }}" class="btn btn-primary shadow btn-xs sharp me-1"> <i class="fa-regular fa-eye"></i></a>
                                                    <a href="{{ url('admin/airs-members/edit') }}{{ '/'.$m->id }}" class="btn btn-secondary shadow btn-xs sharp me-1"><i class="fa fa-edit"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp delete" data-id="{{ $m->id }}"><i class="fa-regular fa-trash-can"></i></a>  
                                                    <a href="javascript:void(0)" class="btn btn-success shadow btn-xs sharp send_mail" data-id="{{ $m->id }}" style="margin-left:5px;"><i class="fa fa-envelope"></i></a>
                                                    <a href="javascript:void(0)" class="btn btn-dark shadow btn-xs sharp reg_confiramtion_mail" data-id="{{ $m->id }}" style="margin-left:5px;"><i class="fa fa-user-plus" aria-hidden="true"></i></a>
                                                </div>
                                       
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
<div class="modal fade" id="delrecord">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body ">
                <div class="text-center">
                    <div class="text-danger">
                        <i class="fa fa-trash fs-30"></i>
                    </div>
                    <div class="mt-4 mb-5">
                        <h4 class="mb-2">Are you sure ?</h4>
                        <p class="text-muted mx-3 mb-0 fs-16">Are you sure you want to remove this record ?</p>
                    </div>
                </div>
                <div class=" text-center">
                    <form name="delete-product" id="delete-product" method="post" action="javascript:void(0)">
                        @csrf
                        <input type="hidden" name="id" id="id" value=""/>
                        <button type="submit" class="btn btn-primary">Delete</button>
                        <button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer_script')
<link href="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-datatables5.3.2/css/bootstrap5.3.2.min.css' }}" rel="stylesheet">
<link href="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-datatables5.3.2/css/bootstrap5.min.css' }}" rel="stylesheet">

<script src="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-datatables5.3.2/js/bootstrap5.3.2.bundle.min.js' }}"></script>
<script src="{{ env('APP_URL').'public/admin_asset/vendor/bootstrap-datatables5.3.2/js/bootstrap5.min.js' }}"></script>


<script>
$(document).ready(function() {
    //let table = new DataTable('#table_id');
let table;
table = new DataTable('#example1', {
    ordering: false,
    order: [[2, 'desc']],
    paging: true,
    searching: true,
     language: {
        paginate: {
            previous: "<",
            next: ">"
        }
    },
    scrollX: false,
});


}); 
$(document).on("click",".delete",function() {
    let id = $(this).data("id");
    $('#delrecord').modal('show');
    $('#delrecord #id').val(id);
    $('#delrecord #delete-product').attr('action', "{{ url('admin/delete-airs-members') }}");
});
$(document).on("click","#search-btn",function() {
    $('#search').attr("action", "{{ url('admin/airs-members') }}");
    $('#search').submit();
});
$(document).on("click","#export-btn",function() {
    $('#search').attr("action", "{{ url('admin/airs-members/export') }}");
    $('#search').submit();
});
$(document).on("click",".send_mail",function() {
    let id = $(this).data("id");
    if(typeof id !== 'undefined'){
        $.get("{{ url('admin/airs-members/send_mail') }}"+"/"+id, function(data, status){
            if(data.status == true){
                toastSucess(data.msg);
            } else if(data.status == false) {
                toastError(data.msg)
            } else {
                toastError(data.msg);
            }
        });
    }
});
$(document).on("click",".reg_confiramtion_mail",function() {
    let id = $(this).data("id");
    if(typeof id !== 'undefined'){
        $.get("{{ url('admin/reg-confiramtion-mail') }}"+"/"+id, function(data, status){
            if(data.status == true){
                toastSucess(data.msg);
            } else if(data.status == false) {
                toastError(data.msg)
            } else {
                toastError(data.msg);
            }
        });
    }
});
</script>
@endsection