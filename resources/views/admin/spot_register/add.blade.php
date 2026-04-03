@extends('layouts.admin')
@section('title_bar', 'Onsite Registration')
@section('breadcrumb', 'Onsite Registration')
@section('maincontent')

<div class="content-body">
<!-- container starts -->
<div class="container-fluid">
<!-- row -->
    <div class="demo-view">
        <div class="container-fluid pt-0 ps-0 pe-lg-4 pe-0">
            <div class="row">
                 <div class="col-xl-12 mb-2">
                    <div class="card" id="accordion-one">
                        <div class="card-header">
                                <h4 class="card-title">Spot Registration</h4>
                        </div>
                        <div class="card-body">
                           <form action="{{ route('admin.onsite.register.store') }}" method="POST">
                            @csrf
                        
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                            </div>
                        
                            <div class="mb-3">
                                <label>Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" required value="{{ old('mobile') }}">
                            </div>
                        
                            <div class="mb-3">
                                <label>Amount</label>
                                <input type="number" name="amount" class="form-control" required value="{{ old('amount') }}">
                            </div>
                        
                            <div class="mb-3">
                                <label>Payment Mode</label>
                                <select name="payment_mode" class="form-control" required>
                                    <option value="cash">Cash</option>
                                    <option value="online">Online</option>
                                </select>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
 
                            
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
    $(document).ready(function(){

@if(session('error'))
    Swal.fire({
        icon: 'error',
        title: 'Oops!',
        text: "{{ session('error') }}",
    });
@endif
});
</script>
@endsection
