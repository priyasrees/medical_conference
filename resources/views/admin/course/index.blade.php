@extends('layouts.admin')
@section('title_bar', 'Hands on Training')
@section('breadcrumb', 'Hands on Training')
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
                <div class="col-xl-12">
                    <div class="card" id="accordion-one">
                        <form name="search" id="search" method="get" action="javascript:void(0)" >
                        <div class="card-header d-flex justify-content-between align-items-center px-3">
                              <h4 class="card-title mb-0">Hands on Training</h4>
                              <button class="btn btn-success" id="export-btn">
                                <i class="fa-regular fa-file-excel"></i>
                              </button>
                            </div>
                            </form>
                        <!--tab-content-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>Membership ID</th>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                            <th>Training Courses</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($member) && !empty($member))
                                        @foreach($member as $m)
                                        @if(isset($m->training) && !empty($m->training))
                                        @php 
                                            $category = App\Models\Member::where('id', $m->member_id)->pluck('category')->first();
                                            if($category == 'pg-students'){
                                            	$category = str_replace("pg-students","pg-student",$category);
                                            }
                                        @endphp
                                        <tr>
                                            <td><a href="{{ url('admin/'.$category.'/detail') }}{{ '/'.$m->member_id }}"><span class="text-primary font-w600">
                                                {{ isset($m->membership_no) && !empty($m->membership_no) ? 'RHIN'.'0000'.$m->member_id : 'RHIN'.'0000'.$m->member_id }}
                                                </span></a></td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ $m->code.' '.$m->mobile }}</td>
                                            <td>
                                                <ul>
                                                @foreach(explode(',', $m->training) as $t)
                                                <li>{{$t}}</li>
                                                @endforeach
                                                </ul>
                                            </td>
                                            
                                        </tr>
                                        @endif
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
<script>
    $(document).on("click","#export-btn",function() {
    $('#search').attr("action", "{{ url('admin/handstrain/export') }}");
    $('#search').submit();
});
    $(document).on("click",".delete",function() {
        let id = $(this).data("id");
        $('#delrecord').modal('show');
        $('#delrecord #id').val(id);
        $('#delrecord #delete-product').attr('action', "{{ url('admin/delete-airs-members') }}");
    });
</script>
@endsection