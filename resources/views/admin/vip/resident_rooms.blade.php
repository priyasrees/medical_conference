@extends('layouts.admin')
@section('title_bar', 'Resident Rooms')
@section('breadcrumb', 'Resident Rooms')
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
                        <div class="card-header flex-wrap px-3">
                            <div>
                                <h4 class="card-title">Resident Rooms</h4>
                            </div>
                        </div>
                        <!--tab-content-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Name</th>
                                            <th>Total Count</th>
                                            <th>Used Count</th>
                                            <th>Pending Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Single/Double Residential Package</td>
                                            <td>80</td>
                                            <td>{{ $member_count }}</td>
                                            <td>{{80 - $member_count }}</td>
                                        </tr>                                
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
@endsection
@section('footer_script')
@endsection