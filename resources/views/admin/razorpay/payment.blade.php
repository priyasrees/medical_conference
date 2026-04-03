<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
var options = {
    "key": "{{ $razorpay_key }}",
    "amount": "{{ $amount * 100 }}", // in paise
    "currency": "INR",
    "name": "Onsite Registration",
    "order_id": "{{ $order_id }}",
    "handler": function (response){
        // Payment success → AJAX call to server
        $.ajax({
            url: '{{ route("onsite.razorpay.success") }}',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                razorpay_payment_id: response.razorpay_payment_id,
                order_id: response.razorpay_order_id
            },
            success: function(res){
                Swal.fire({
                    icon: 'success',
                    title: 'Payment Successful!',
                    text: 'Onsite registration completed successfully.',
                    timer: null,
                    allowOutsideClick: false,

                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/admin/onsite";   // redirect page
                    }
                });
            },
            error: function(err){
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Failed!',
                    text: 'Something went wrong. Redirecting to add page.',
                }).then(() => {
                    window.location.href = '{{ url("admin/onsite_registration") }}';
                });
            }
        });
    },
    "modal": {
        "ondismiss": function(){
            // User closed modal without payment
            Swal.fire({
                icon: 'error',
                title: 'Payment Failed!',
                text: 'You closed the payment modal. Redirecting to onsite register page.',
                showConfirmButton: true,
            }).then(() => {
                window.location.href = '{{ url("admin/onsite_registration") }}';
            });
        }
    },
    "prefill": {
        "name": "{{ $data['name'] ?? '' }}",
        "contact": "{{ $data['mobile'] ?? '' }}"
    },
    "theme": {
        "color": "#528FF0"
    }
};

var rzp = new Razorpay(options);
rzp.open();
</script>
