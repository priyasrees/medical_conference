@extends('layouts.admin')
@section('title_bar', 'Spot Registration')
@section('breadcrumb', 'Spot Registration')
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
                <a href="{{ route('admin.spot_register.add') }}" class="btn btn-secondary" style="float:right;font-size:13px!important;"><i class="bi bi-plus-circle align-baseline me-1"></i> Register
</a>
                </div>
                <div class="col-xl-12">
                    <div class="card" id="accordion-one">
                        <div class="card-header">
                                <h4 class="card-title">Spot Registration</h4>
                            
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
                                                Name
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Mobile No
                                            </th>
                                             <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Payment Mode
                                            </th>
                                            <th scope="col" class="sort cursor-pointer" data-sort="source">
                                                Amount
                                            </th>
                                           
                                           
                                            <th>Date</th>
                                            <!--<th scope="col">Action</th>-->
                                        </tr>
                                    </thead>
                                    <tbody class="list form-check-all">
                                        @forelse($data as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->mobile }}</td>
                                            <td>{{ $row->payment_mode ?? '-' }}</td>
                                            <td>{{ $row->amount }}</td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Records Found</td>
                                        </tr>
                                    @endforelse
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){

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
         @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "{{ session('success') }}",
            timer: 2000,
            showConfirmButton: true
        });
    @endif
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: "{{ session('error') }}",
        });
    @endif
    });
    
</script>
@endsection