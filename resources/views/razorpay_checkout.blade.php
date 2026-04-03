<!-- razorpay_checkout.blade.php -->
<html>
<head>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<script>
    // alert(@json($amount));
    // alert(@json($currency));
    // alert(@json($userName)); alert(@json($userEmail)); alert(@json($userMobile));
    
    // alert(@json($order_id));
    
    // Razorpay payment options
    var options = {
        "key": "{{ $key }}",
        "amount": "{{ $amount }}", // Amount is in currency subunits (paise)
        "currency": "{{ $currency }}",
        "name": "Rhinocon",
        "description": "Purchase Description",
        "order_id": "{{ $order_id }}", // Order ID from Razorpay
         "prefill": {
            "name": "{{ $userName ?? '' }}",
            "email": "{{ $userEmail ?? '' }}",
            "contact": "{{ $userMobile ?? '' }}",
        },
       
        "handler": function (response){
            // Payment successful callback
            Swal.fire({
        title: 'Verifying payment...',
        text: 'Please wait while we confirm your payment.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
     let refId = response.razorpay_order_id ? response.razorpay_order_id : response.razorpay_payment_id;
            // Wait for webhook to update the backend (optional delay)
    setTimeout(function () {
        // alert(response.razorpay_order_id);
        fetch('/check-payment-status?refId=' + refId)
            .then(res => res.json())
            .then(data => {
                //  alert(data.status);
                if (data.status === 'success') {
                    Swal.fire({
                        title: 'Payment Successful!',
                        text: 'Thank you for your payment.',
                        icon: 'success'
                    }).then(() => {
                        window.location.href = "/registration";
                    });
                } else {
                    Swal.fire({
                        title: 'Payment Failed',
                        text: data.message || 'Your payment could not be verified.',
                        icon: 'error'
                    }).then(() => {
                        window.location.href = "/registration";
                    });
                }
            });
    }, 3000); // wait 3 seconds to allow webhook to finish
},
          //  alert(response.razorpay_payment_id);
            // You can submit the payment response to your backend here via AJAX or form submission
           // window.location.href = "/payment-success?payment_id=" + response.razorpay_payment_id;
          // window.location.href = "/registration"
        
        "modal": {
            "ondismiss": function(){
                Swal.fire({
                    title: "Are you sure ?",
                    text: "Do you want to Cancel the Payment ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#9fd638",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Swal.fire({
                                title: "Payment Cancel",
                                text: "Customer was cancel the payment",
                                icon: "error"
                            });
                             window.location.href = "/registration";
                        } else {
                            $('#payBtn').trigger('click');
                        }
                });
                // User closed the payment form without paying
              
            }
        },
       
        "theme": {
            "color": "#3399cc"
        }
    };

    var rzp1 = new Razorpay(options);
        rzp1.on("payment.failed", function (response) {
    Swal.fire(
        "Payment Failed",
        response.error.description, // e.g. "Payment failed"
        "error"
    );

    // console.log("Payment failed reason:", response.error.reason); 
    // console.log("Payment ID:", response.error.metadata.payment_id);
    // console.log("Order ID:", response.error.metadata.order_id);
});

    // Auto open checkout on page load
    window.onload = function(){
        rzp1.open();
    }
</script>

</body>
</html>
