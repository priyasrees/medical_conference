<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
	*{
    margin: 00px;
    padding: 00px;
    box-sizing: content-box;
}

.container {
    height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    
    flex-direction: row;
    flex-flow: wrap;
	padding:20px;

}
.hr{
	color: #fff;
	background-color: #e6ebe0;
}
.font{
    height: 450px;
    width: 250px;
    position: relative;
    border-radius: 10px;
	border:1px solid #AD0E60;
}

.top{
    height: 30%;
    width: 100%;
    background-color: #AD0E60;
    position: relative;
    z-index: 5;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
}
.top1{
	
    width: 100%;
    background-color: #AD0E60;
    position: relative;
    z-index: 5;
    border-top-left-radius: 0px;
    border-top-right-radius: 15px;
}
.bottom{
    height: 70%;
    width: 100%;
    background-color: white;
    position: absolute;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.top img{
    height: 100px;
    width: 100px;
    background-color: #e6ebe0;
    border-radius: 10px;
    position: absolute;
    top:60px;
    left: 75px;
}
.top1 img{
    background-color: #fff;
    position: absolute;
	border-radius: 10px;
    top:30px;
    left: 25px;
}
.bottom p{
    position: relative;
    top: 60px;
    text-align: center;
    text-transform: capitalize;
    font-weight: bold;
    font-size: 16px;
    text-emphasis: spacing;
}
.bottom .desi{
    font-size:12px;
    color: grey;
    font-weight: normal;
}
.bottom .no{
    font-size: 15px;
    font-weight: normal;
}
.barcode img
{
    height: 65px;
    width: 65px;
    text-align: center;
    margin: 5px;
}
.barcode{
    text-align: center;
    position: relative;
    top: 70px;
}

.back
{
    height: 450px;
    width: 250px;
    border-radius: 10px;
    background-color: #AD0E60;

}
.qr img{
    height: 80px;
    width: 100%;
    margin: 20px;
    background-color: white;
}
.Details {
    color: white;
    text-align: center;
    padding: 10px;
    font-size: 25px;
}


.details-info{
	position: relative;
	top:90px;
    color: white;
    text-align: left;
    padding: 5px;
    line-height: 20px;
    font-size: 16px;
    text-align: center;
    margin-top: 20px;
    line-height: 22px;
}

.logo {
    height: 40px;
    width: 150px;
    padding: 40px;
}

.logo img{
    height: 100%;
    width: 100%;
    color: white ;

}

@media screen and (max-width:400px)
{
    .container{
        height: 130vh;
    }
    .container .front{
        margin-top: 50px;
    }
}
@media screen and (max-width:600px)
{
    .container{
        height: 130vh;
    }
    .container .front{
        margin-top: 50px;
    }

}</style>
    <title>ID Card</title>
<!--     
    So lets start -->
</head>
<body>
   
<div class="container">
   
    <div style="width:45%;float:left;">
        
	<div class="font">
		<div class="top">
			<img src="{{ isset($member->profile) && !empty($member->profile) && file_exists(public_path(str_replace('/public','',$member->profile))) ? public_path(str_replace('/public','',$member->profile)) : public_path('/id_card/download.png') }}" style="width:100px;border-radius:50%!important;">
		</div>
		<div class="bottom">
		    <p class="desi">{{ isset($member->membership_no) && !empty($member->membership_no) ? 'RHIN'.'0000'.$member->id : 'RHIN'.'0000'.$member->id }}</p>
			<p>{{ isset($member->name) && !empty($member->name) ? ucfirst($member->name) : '' }}</p>

			<p class="desi">{{ isset($member->category) && !empty($member->category) ? ucfirst($member->category) : '' }}</p>
			
			<div class="barcode">
				<img src="{{ public_path($member->qr_code) }}" />
			
			</div>
			@if($member->type !== "vip")
			@if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price != 0.00 && isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price != 0.00)
			<img src="{{ public_path('Untitled-1.jpg') }}" style="width:40px;position:relative;left:5px;" />
			<img src="{{ public_path('Untitled-2.jpg') }}" style="width:40px;position:relative;top:45px;left:-40px;" />
			@elseif(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price != 0.00)
			<img src="{{ public_path('Untitled-1.jpg') }}" style="width:40px;position:relative;top:10px;left:10px;" />
			@elseif(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price != 0.00)
			<img src="{{ public_path('Untitled-2.jpg') }}" style="width:40px;position:relative;top:10px;left:10px;" />
			@endif
			@elseif($member->type == "vip")
			@if(isset($package->gala_dinner) && !empty($package->gala_dinner) && isset($package->room_tarrif) && !empty($package->room_tarrif))
			<img src="{{ public_path('Untitled-1.jpg') }}" style="width:40px;position:relative;left:5px;" />
			<img src="{{ public_path('Untitled-2.jpg') }}" style="width:40px;position:relative;top:45px;left:-40px;" />
			@elseif(isset($package->gala_dinner) && !empty($package->gala_dinner))
			<img src="{{ public_path('Untitled-1.jpg') }}" style="width:40px;position:relative;top:10px;left:10px;" />
			@elseif(isset($package->room_tarrif) && !empty($package->room_tarrif))
			<img src="{{ public_path('Untitled-2.jpg') }}" style="width:40px;position:relative;top:10px;left:10px;" />
			@endif
			@endif
		  
			<p class="no" style="margin-top:10px;">{{ isset($member->mobile) && !empty($member->mobile) ? $member->code.' '.$member->mobile : '' }}</p>
		
			<p class="no" style="font-size:13px!important;">
				{{ isset($member->address) && !empty($member->address) ? ucfirst($member->address) : '' }}<br/>
				
			</p>
		</div>
	</div>
	</div>
	<div style="width:45%;float:right;">
	<div class="back">
		<h1 class="Details">Information</h1>
		<hr class="hr">
			<div class="top1">
				<img src="{{ public_path('logo.png') }}" style="width:200px;">
			</div>
		<div class="details-info">
			<p style="font-size:14px;">Email : {{ isset($member->email) && !empty($member->email) ? ucfirst($member->email) : '' }}</p>
			<p style="font-size:14px;">Mobile No: {{ isset($member->mobile) && !empty($member->mobile) ? $member->code.' '.$member->mobile : '' }}</p>
			<p style="margin-top:15px;text-align:centre;"><b>Office Address:</b></p>
			<p style="font-size:13px;">1, Grand Southern Trunk Rd, Ramapuram,<br/>Alandur, St.Thomas Mount, Chennai,<br/>Tamil Nadu 600016</b></p>
			</div>
		</div>
	</div>
	</div>
</div>   
</body>
</html>