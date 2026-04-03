@extends('layouts.admin')
@section('title_bar', 'Onsite Payment History')
@section('breadcrumb', 'Onsite Payment History')
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
                                <h4 class="card-title">Onsite Payment History</h4>
                            </div>
                        </div>
                        <!--tab-content-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                         <tr>
                                            <th>S.No</th>
                                            <th>Transaction ID</th>
                                            <th>Amount</th>
                                            <th>Payment Mode</th>
                                            <th>Status</th>
                                            <th>Payment Date</th>
                                            <th>User Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($payment) && !empty($payment))
                                        @foreach ($payment as $pay)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pay->transaction_id }}</td>
                                                <td>{{ $pay->amount }}</td>
                                                <td>{{ $pay->payment_mode }}</td>
                                                <td>{{ $pay->status }}</td>
                                                <td>{{ $pay->created_at->format('Y-m-d H:i:s') }}</td>
                                                <td>{{ $pay->user->name ?? 'N/A' }}</td>
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
<div class="modal fade" id="delrecord" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Payment Screen Shot</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >
        <img src="" class="payment_screen_shot" style="width:750px;height:550px;"/>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer_script')
<script>
    $(document).on("click",".screen_shot",function() {
        let image_path = "";
        image_path = $(this).data("image");
        $('#delrecord .payment_screen_shot').attr('src', image_path);
        $('#delrecord').modal('show');
    });
</script>
@endsection