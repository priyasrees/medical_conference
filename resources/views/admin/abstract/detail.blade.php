@extends('layouts.admin')
@section('title_bar', 'Abstract Detail')
@section('breadcrumb', 'Abstract Detail')
@section('maincontent')
<div class="content-body">
    <div class="container-fluid">
        <!-- Row -->
        
        <div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Abstract Details</h5>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label text-primary">Name<span
                                class="required">*</span></label>
                            <input readonly type="text" class="form-control" id="name" name="name" placeholder="" value="{{isset($member->name) && !empty($member->name) ? $member->name : '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-primary">Email<span class="required">*</span></label>
                            <input readonly type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="{{isset($member->email) && !empty($member->email) ? $member->email : '' }}">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label text-primary">Registration ID<span class="required">*</span></label>
                            <input readonly type="text" class="form-control" id="mobile" name="mobile" placeholder="" value="{{isset($member->reg_id) && !empty($member->reg_id) ? $member->reg_id : '' }}">
                        </div>
                        
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            @php
                                $catergory = isset($member->catergory_id) && !empty($member->catergory_id) ? json_decode($member->catergory_id) : [];
                                  $categories = [
                                    0 => "Dr.I.S.Gupta Award presentation for Senior Consultant",
                                    1 => "Mrs.Neena Saharia Award presentation for Junior Consultant",
                                    2 => "Dr. Adesh Saxena and Dr.Mita Saxena Award presentation for Post Graduate",
                                    3 => "Dr. Arvind Soni Award - Video Session",
                                    4 => "Dr. Anoop Raj Award - Poster Session"
                                ];
                            @endphp
                            @if(isset($catergory) && !empty($catergory))
                               @for($i = 0; $i <= 4; $i++)
                               @php
                                $field = "title_$i";
                                $title = $member->$field ?? null;
                                $note = $i === 0  ? "note" : "note_$i";
                                $abstracts = $member->$note ?? null;
                                $file = $i === 0  ? "file" : "file_$i";
                                $files = $member->$file ?? null;
                                $fileUrl = $files ? asset($files) : null;
                            @endphp
                            @if(isset($title))
                                    <div class="col-xl-6 col-sm-6 mt-4">
                                        <h4>{{ $categories[$i] }}</h4>
                                          <h5>Title: {{ $title }}</h5>
                                        @if($abstracts)
                                           <label for="email" class="form-label text-primary">Abstract</label>
                                            <textarea class="form-control" id="address" name="address" rows="6">{{ $abstracts }}</textarea>
                                        @endif
                                        <p>
                                           <a class="text-primary" href="{{ $fileUrl }}" download>Document Link</a>
                                        </p>
                                         </div>
                                @endif
                                @endfor
                                
                            @endif
                            

                              
                    </div>
                    
                </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
    </div>
</div>

@endsection
@section('footer_script')
<script>
$(document).on("click","#profile_image_remove",function() {
    $("#imagePreview").removeAttr('style');
    $("#imagePreview").attr('style', 'background-image: url("{{ env('APP_URL').'public/admin_asset/images/no-img-avatar.png' }}")');
    $("#profile1").val('');
});

</script>
@endsection