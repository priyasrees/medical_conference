@extends('layouts.admin')
@section('title_bar', 'Attendance')
@section('breadcrumb', 'Attendance')
@section('maincontent')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <!-- Row -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="">
    <div class="demo-view">
        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
            <div class="row">
                <!-- Column starts -->
                <div class="col-xl-12">
                    <div class="card" id="accordion-one">
                             <form name="search" id="search" class="d-none" method="get" action="javascript:void(0)" >
                        <div class="card-header d-flex justify-content-between align-items-center px-3">
                              <h4 class="card-title mb-0">Attendance</h4>
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
                                            <th>Attendance Date</th>
                                            <!--<th>Mobile Number</th>-->
                                            <!--<th>City</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($member) && !empty($member))
                                        @foreach($member as $m)
                                        <tr>
                                            <td><a href="{{ url('admin/' . $m->category . '/detail/' . $m->id) }}"><span class="text-primary font-w600">{{ isset($m->membership_no) && !empty($m->membership_no) ? 'RHIN'.'0000'.$m->id : 'RHIN'.'0000'.$m->id }}</span></a></td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ isset($m->attendance_max_scanned_at) && !empty($m->attendance_max_scanned_at) ? date('M d, Y',strtotime($m->attendance_max_scanned_at)) : '--' }}</td>
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
                    </div>
                    </div>
                    </div>
                    @endsection
@section('footer_script')
@endsection