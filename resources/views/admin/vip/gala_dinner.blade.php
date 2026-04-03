@extends('layouts.admin')
@section('title_bar', 'Gala Dinner')
@section('breadcrumb', 'Gala Dinner')
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
                              <h4 class="card-title mb-0">Gala Dinner</h4>
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
                                            <th>Date</th>
                                            <th>Mobile Number</th>
                                            <th>City</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($member) && !empty($member))
                                        @foreach($member as $m)
                                        <tr>
                                            <td><a href="{{ url('admin/' . $m->category . '/detail/' . $m->id) }}"><span class="text-primary font-w600">{{ isset($m->membership_no) && !empty($m->membership_no) ? 'RHIN'.'0000'.$m->id : 'RHIN'.'0000'.$m->id }}</span></a></td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ isset($m->created_at) && !empty($m->created_at) ? date('M d, Y',strtotime($m->created_at)) : '--' }}</td>
                                            <td>{{ $m->code.' '.$m->mobile }}</td>
                                            <td>{{ $m->city }}</td>
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
</div>
</div>
@endsection
@section('footer_script')
<script>
     $(document).on("click","#export-btn",function() {
        $('#search').attr("action", "{{ url('admin/gala-dinner/export') }}");
        $('#search').submit();
    });
    
    </script>
@endsection