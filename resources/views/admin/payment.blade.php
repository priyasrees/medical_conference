@extends('layouts.admin')
@section('title_bar', 'Payment')
@section('breadcrumb', 'Payment')
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
                                <h4 class="card-title">Airs Member</h4>
                            </div>
                        </div>
                        <!--tab-content-->
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table id="example" class="display table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Member ID</th>
                                            <th>Payment ID</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Mobile Number</th>
                                            <th>Status</th>
                                            <th>Amount</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($member) && !empty($member))
                                        @foreach($member as $key=>$m)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td><a href="{{ url('admin/'.$m->category.'/detail') }}{{ '/'.$m->member_id }}"><span class="text-primary font-w600">{{ isset($m->member_id) && !empty($m->member_id) ? 'RHIN'.'0000'.$m->member_id : 'RHIN'.'0000'.$m->member_id }}</span></a></td>
                                            <td>{{ $m->payment_id }}</td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ isset($m->created_at) && !empty($m->created_at) ? date('M d, Y',strtotime($m->created_at)) : '--' }}</td>
                                            <td>{{ $m->code.' '.$m->mobile }}</td>
                                            <td>{{ $m->payment_status }}</td>
                                            <td>
                                                @if(isset($m->category) && !empty($m->category) && $m->category == 'international')
                                                $ {{ $m->total }}
                                                @else
                                                ₹ {{ $m->total }}
                                                @endif
                                            </td>
                                           <!-- 
                                            <td><a href="javascript:void(0)" data-image="{{ isset($m->payment_screen_shot) && !empty($m->payment_screen_shot) && public_path(str_replace('/public','',$m->payment_screen_shot)) ? env('APP_URL').$m->payment_screen_shot : '' }}" class="screen_shot"><img src="{{ isset($m->payment_screen_shot) && !empty($m->payment_screen_shot) && public_path(str_replace('/public','',$m->payment_screen_shot)) ? env('APP_URL').$m->payment_screen_shot : '' }}" width="100px;"></a</td>-->
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