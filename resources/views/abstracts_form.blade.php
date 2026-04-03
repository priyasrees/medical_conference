@extends('layouts.web')
@section('title_bar', 'Abstracts | RHINOCON 2025')
@section('breadcrumb')
<div class="inner-page-header" style="background-image: url({{ env('APP_URL').'public/asset/img/bg/breadcrumb1.jpg' }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="heading1 text-center">
                    <h1>Abstract Form</h1>
                    <div class="space10"></div>
                    <a href="{{ url('/') }}">Home <i class="fa-solid fa-angle-right"></i> <span>Abstract Form</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container d-block">
			<div class="row">
			    <div class="col-lg-12 m-auto">
			        <div class="heading7 text-center space-margin60">
					    
						<div class="space20"></div>

						<h2>Registration Closed</h2>
					</div>
			        
			    </div>
			    </div>
			    </div>
<div class="contact-inner-section sp1 d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="heading2 text-center space-margin60">
                    <h5>Fill up the Form</h5>
                    <div class="space18"></div>
                    <h2>Abstract Form </h2>
                </div>
            </div>
        </div>
        <div class="registration ">
            <div class=" contact4-boxarea" data-aos="zoom-in" data-aos-duration="1000">
                <div class="row">
                    <div class="col-lg-8 align-items-center">
                        @if (session()->has('error'))
                            @if(count(session()->get('error')) >0 )
                                @foreach(session()->get('error') as $error)
                                    <p class="mb-4 text-muted op-7 fw-normal text-center error">{{$error}}</p>
                                @endforeach
                            @endif
                        @endif
                        <form action="{{ url('abstract-store') }}" class="fs-form " name="abstract-form" id="abstract-form" method="POST" enctype= "multipart/form-data">
                            @csrf
                            <fieldset>
                                <div class="row  ">
                                    <h3>Abstract Submission for RHINOCON 2025</h3>
                                    <div class="space24"></div>
                                    <ul>
                                        <li> <img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}"> Kindly follow rules for
                                            abstract submission as mentioned on website
                                        </li>
                                        <li> <img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}"> Conference registration is
                                            mandatory for abstract submission
                                        </li>
                                        <li> <img src="{{ env('APP_URL').'public/asset/img/icons/check2.svg' }}"> Visit www.rhinocon2025.com for
                                            registration and other details
                                        </li>
                                    </ul>
                                    <div class="space24"></div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="name">Name</label>
                                            <input class="fs-input" id="name" name="name" required />
                                        </div>
                                        <span class="error" id="name_error">@if($errors->has('name')) {{ $errors->first('name') }} @endif</span>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fs-field">
                                            <label class="fs-label" for="email">Email</label>
                                            <input class="fs-input" id="email" name="email" required />
                                        </div>
                                        <span class="error" id="email_error">@if($errors->has('email')) {{ $errors->first('email') }} @endif</span>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="fs-field">
                                            <label class="fs-label" for="reg-id">RHINOCON 2025 Registration
                                            ID<br />(Sent via email at the time of registration)
                                            </label>
                                            <input class="fs-input" id="reg_id" name="reg_id" required />
                                        </div>
                                        <span class="error" id="reg_id_error">@if($errors->has('reg_id')) {{ $errors->first('reg_id') }} @endif</span>
                                    </div>
                                    
                                    <h5 class="mb-2">Abstract Category</h5>
                                    <div class="col-lg-12">
                                        <div class="fs-field">
                                            <label class="fs-label" for="category_1">
                                                <input required="" class="fs-checkbox category" name="category_id[]" id="category_1" type="checkbox" value="Dr.I.S.Gupta Award presentation for Senior Consultant" /> <span style="position:relative;top:-3px;left:10px;">Dr.I.S.Gupta Award presentation for Senior Consultant</span>
                                            </label>
                                        </div>
                                        <div class="row align-items-center" id="abstract_category_0" style="display:none;">
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="gupta_award_title">Title </label>
                                                <input type="text" class="form-control" name="title_0" id="gupta_award_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="note_0">Abstract (Paste your abstract here, maximum 300 words) </label><textarea class="fs-textarea" id="note_0" name="note_0" rows="10" required></textarea></div>
                                                <span class="error" id="note_error">@if($errors->has("note")) {{ $errors->first("note") }} @endif</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="file_0">Kindly upload your Word/Doc file </label>
                                                <input required class="form-control" type="file" id="file_0" name="file_0" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                                </div>
                                                <span class="bg_image-error"></span><span class="error" id="file_error">@if($errors->has("file")) {{ $errors->first("file") }} @endif</span>
                                            </div>
                                        </div>
                                        <div class="fs-field">
                                            <label class="fs-label" for="category_2">
                                                <input required class="fs-checkbox category" name="category_id[]" id="category_2" type="checkbox" value="Mrs.Neena Saharia Award presentation for Junior Consultant" /> <span style="position:relative;top:-3px;left:10px;">Mrs.Neena Saharia Award presentation for Junior Consultant</span>
                                            </label>
                                        </div>
                                        <div class="row align-items-center" id="abstract_category_1" style="display:none;">
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="saharia_award_title">Title </label>
                                                <input type="text" class="form-control" name="title_1" id="saharia_award_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="note_1">Abstract (Paste your abstract here, maximum 300 words) </label><textarea class="fs-textarea" id="note_1" name="note_1" rows="10" required></textarea></div>
                                                <span class="error" id="note_error">@if($errors->has("note")) {{ $errors->first("note") }} @endif</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="file_1">Kindly upload your Word/Doc file </label><input required class="form-control" type="file" id="file_1" name="file_1" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></div>
                                                <span class="bg_image-error"></span><span class="error" id="file_error">@if($errors->has("file")) {{ $errors->first("file") }} @endif</span>
                                            </div>
                                        </div>
                                        <div class="fs-field">
                                            <label class="fs-label" for="category_3">
                                            <input required class="fs-checkbox category" name="category_id[]" id="category_3" type="checkbox" value="Dr. Adesh Saxena and Dr.Mita Saxena Award presentation for Post Graduate" /> <span style="position:relative;top:-3px;left:10px;">Dr. Adesh Saxena and Dr.Mita Saxena Award presentation for Post Graduate</span>
                                            </label>
                                        </div>
                                        <div class="row align-items-center" id="abstract_category_2" style="display:none;">
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="saxena_award_title">Title </label>
                                                <input type="text" class="form-control" name="title_2" id="saxena_award_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="note_2">Abstract (Paste your abstract here, maximum 300 words) </label><textarea class="fs-textarea" id="note_2" name="note_2" rows="10" required></textarea></div>
                                                <span class="error" id="note_error">@if($errors->has("note")) {{ $errors->first("note") }} @endif</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="file_2">Kindly upload your Word/Doc file </label><input required class="form-control" type="file" id="file_2" name="file_2" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></div>
                                                <span class="bg_image-error"></span><span class="error" id="file_error">@if($errors->has("file")) {{ $errors->first("file") }} @endif</span>
                                            </div>
                                        </div>
                                        <div class="fs-field">
                                            <label class="fs-label" for="category_4">
                                            <input required class="fs-checkbox category" name="category_id[]" id="category_4" type="checkbox" value="Dr. Arvind Soni Award - Video Session" /> <span style="position:relative;top:-3px;left:10px;">Dr. Arvind Soni Award - Video Session</span>
                                            </label>
                                        </div>
                                        <div class="row align-items-center" id="abstract_category_3" style="display:none;">
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="soni_award_title">Title </label>
                                                <input type="text" class="form-control" name="title_3" id="soni_award_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="note_3">Abstract (Paste your abstract here, maximum 300 words) </label><textarea class="fs-textarea" id="note_3" name="note_3" rows="10" required></textarea></div>
                                                <span class="error" id="note_error">@if($errors->has("note")) {{ $errors->first("note") }} @endif</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="file_3">Kindly upload your Word/Doc file </label><input required class="form-control" type="file" id="file_3" name="file_3" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></div>
                                                <span class="bg_image-error"></span><span class="error" id="file_error">@if($errors->has("file")) {{ $errors->first("file") }} @endif</span>
                                            </div>
                                        </div>
                                        <div class="fs-field">
                                            <label class="fs-label" for="category_5">
                                            <input required class="fs-checkbox category" name="category_id[]" id="category_5" type="checkbox" value="Dr. Anoop Raj Award - Poster Session" /> <span style="position:relative;top:-3px;left:10px;">Dr. Anoop Raj Award - Poster Session</span>
                                            </label>
                                        </div>
                                        <div class="row align-items-center" id="abstract_category_4" style="display:none;">
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="poster_award_title">Title </label>
                                                <input type="text" class="form-control" name="title_4" id="poster_award_title">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="note_4">Abstract (Paste your abstract here, maximum 300 words) </label><textarea class="fs-textarea" id="note_4" name="note_4" rows="10" required></textarea></div>
                                                <span class="error" id="note_error">@if($errors->has("note")) {{ $errors->first("note") }} @endif</span>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="fs-field"><label class="fs-label" for="file_4">Kindly upload your Word/Doc file </label><input required class="form-control" type="file" id="file_4" name="file_4" accept=".doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document"></div>
                                                <span class="bg_image-error"></span><span class="error" id="file_error">@if($errors->has("file")) {{ $errors->first("file") }} @endif</span>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="error" id="category_id_error">@if($errors->has('category_id')) {{ $errors->first('category_id') }} @endif</span>
                                </div>
                                <div class="abstract_other">
                                    
                                </div>
                                <div class="text-end">
                                    <button class="vl-btn1" id="abstract-submit" type="submit">Submit</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
<script src="{{ env('APP_URL').'public/admin_asset/js/jquery.validate.min.js' }}"></script>
<script src="{{ env('APP_URL').'public/admin_asset/js/additional-methods.min.js' }}"></script>
<script>
$(document).ready(function(){
   // $(document).on("click","#abstract-submit",function() {
//         $("#abstract-form").validate({
//             rules: {
//                 name: { required: true, minlength: 1, maxlength: 100},
//                 email: { required: true, email:true, minlength: 1, maxlength: 100},
//                 reg_id: { minlength: 1, maxlength: 100 },
//                 //note: {required: true, minlength: 50, maxlength: 300},
//                 //file: { required: true, },
//             },
//             messages: {
//                 name: { required: "Name is required", },
//                 reg_id: { required: "Reg. No is required" },
//                 email: { required: "Email is required", },
//                 address: { required: "Address is required",  },
//                 note: { required: "Abstract is required",  },
//                 file: { required: "Word / Doc  is required", },
//             },
//             focusInvalid: true,
//             invalidHandler: function () {
//                 $(this).find(":input.error:first").focus();
//             }
//         });
//       // if ($("form#abstract-form").valid()) {
//             $("#abstract-form").on("submit", function(e) {
//     e.preventDefault(); // prevent default form submission

//     if ($(this).valid()) { // optional: jQuery validate
//         $.ajax({
//             url: $(this).attr("action"), // your form action
//             method: $(this).attr("method"),
//             data: $(this).serialize(),
//             dataType: 'json',
//             success: function(response) {
//                 swal("Success!", response.message, "success");
//             },
//             error: function(xhr) {
//                 if (xhr.status === 422) { // Laravel validation error
//                     let errors = xhr.responseJSON.errors;
//                     // Example: show only the email error
//                     if (errors.email) {
//                         swal("Error!", errors.email[0], "error");
//                     } else {
//                         // show first validation error as fallback
//                         let firstKey = Object.keys(errors)[0];
//                         swal("Error!", errors[firstKey][0], "error");
//                     }
//                 } else {
//                     swal("Error!", "Something went wrong!", "error");
//                 }
//             }
//         });
//     }
// });

//          //   $("form#abstract-form").submit();
//       // }
//     });
   $(document).ready(function() {

    // Initialize jQuery Validate on the form
    $("#abstract-form").validate({
        rules: {
            name: { required: true, minlength: 1, maxlength: 100 },
            email: { required: true, email: true, minlength: 1, maxlength: 100 },
            reg_id: { required: true, minlength: 1, maxlength: 100 },
            // You can add more dynamic rules if needed
        },
        messages: {
            name: { required: "Name is required" },
            email: { required: "Email is required" },
            reg_id: { required: "Registration ID is required" },
        },
        focusInvalid: true,
        invalidHandler: function() {
            $(this).find(":input.error:first").focus();
        },
        errorPlacement: function(error, element) {
           
               if (element.attr("type") === "checkbox") {
                    // Place the error after the container
                    error.appendTo(element.closest(".fs-field"));
                } else {
                    error.insertAfter(element);
                }
            
        },
        submitHandler: function(form) {
               Swal.fire({
                title: 'Please wait...',
                html: 'Processing your request',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading(); // Show spinning loader
                }
            });
            let formData = new FormData(form);
            $.ajax({
                 url: $(form).attr("action"),
                method: $(form).attr("method"),
                data: formData,
                processData: false, 
                 contentType: false,
                dataType: 'json',
                success: function(response) {
                    // SweetAlert success
                    Swal.fire({ position: "top-end", icon: "success", title: response.message, showConfirmButton: !1, timer: 2500});
                    // Optional: reset the form
                    $(form)[0].reset();
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        // Loop through all errors and show first one
                        let messages = Object.values(errors).flat().join("\n");
                         Swal.fire({ position: "top-end", icon: "error", title: messages, showConfirmButton: !1, timer: 2500 });
                    //    swal("Error!", messages, "error");
                    } else {
                         Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Something went wrong!"
                        });
                    }
                }
            });
            return false; // prevent normal form submission
        }
    });

});


    
});
$(document).on("click","#category_1",function() {
    if($('#category_1').is(':checked')){
        $('#abstract_category_0').css('display','block');
    } else {
         $('#abstract_category_0').css('display','none');
    }
});

$(document).on("click","#category_2",function() {
    if($('#category_2').is(':checked')){
        $('#abstract_category_1').css('display','block');
    } else {
         $('#abstract_category_1').css('display','none');
    }
});

$(document).on("click","#category_3",function() {
    if($('#category_3').is(':checked')){
        $('#abstract_category_2').css('display','block');
    } else {
         $('#abstract_category_2').css('display','none');
    }
});

$(document).on("click","#category_4",function() {
    if($('#category_4').is(':checked')){
        $('#abstract_category_3').css('display','block');
    } else {
         $('#abstract_category_3').css('display','none');
    }
});

$(document).on("click","#category_5",function() {
    if($('#category_5').is(':checked')){
        $('#abstract_category_4').css('display','block');
    } else {
         $('#abstract_category_4').css('display','none');
    }
});

/*
$(document).on("click",".category",function() {
    if($('.category').is(':checked')){
        let abstract_data = "";
        let category = new Array();
        $('.category:checkbox:checked').each(function() {
             category.push($(this).val());
        });
        console.log(category.length);
        if(category.length !=0){
            for(var i = 0; i < category.length; i++)
            {
                abstract_data +='<div class="row align-items-center"><div class="col-lg-12"><div class="fs-field"><label class="fs-label" for="note">Abstract (Paste your abstract here, maximum 300 words) </label><textarea class="fs-textarea" id="note_'+i+'" name="note_'+i+'" rows="10" required></textarea></div><span class="error" id="note_error">@if($errors->has("note")) {{ $errors->first("note") }} @endif</span></div><div class="col-lg-12"><div class="fs-field"><label class="fs-label" for="file">Kindly upload your Word/Doc file </label><input required class="form-control" type="file" id="file_'+i+'" name="file_'+i+'" ></div><span class="bg_image-error_'+i+'"></span><span class="error" id="file_error">@if($errors->has("file")) {{ $errors->first("file") }} @endif</span></div></div>';
            }
        }
        console.log(abstract_data);
        $('.abstract_other').html(abstract_data);
    } else {
        $('.abstract_other').html('');
    }
});
*/
function bgValidationPdf(fuData,img_error) {
    if(fuData.files[0].size > 1000000) {
        $(img_error).text('Image size must under 10 MB!');
        fuData.value = "";
    } else {
        var FileUploadPath = fuData.value;
        var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
        if (Extension.toLowerCase() == "doc" || Extension.toLowerCase() == "docx" || Extension.toLowerCase() == "DOC" || Extension.toLowerCase() == "DOCX" || Extension.toLowerCase() == "pdf" || Extension.toLowerCase() == "PDF") {
            
            $(img_error).text('');
        } else {
            $(img_error).text('Word only allows file Support of  doc, docx and pdf');
            fuData.value = "";
            return false;
        }
    }
}
</script>
@endsection