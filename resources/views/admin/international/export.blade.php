<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIRS Members Export</title>
    <style>
        body {
            text-align: center!important;
            margin: 0px;
            padding:0px;
        }

        table {
            border: 1px solid #000;
            margin: 20px auto;
            
        }

        table table {
            border: 1px solid #000;
            margin: 10px auto;
            text-align: center!important;
        }
        td, th{
            border: 1px solid #000;
        }
        td {
            padding: 20px;
            text-align: center!important;
            vertical-align: middle!important;
        }
    </style>
</head>
<body>
    <table width="100%" align="center">
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Member ID</th>
                <th>Category Name</th>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Medical Registration Number</th>
                <th>Designation</th>
                <th>Institute</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Pincode</th>
                <th>Country</th>
                <th>Plan</th>
                <th>Plan Amount</th>
                <th>Plan Total</th>
                @if(isset($option) && !empty($option) && $option == 'all')
                    <th>Become Aris Member</th>
                    <th>Gala Dinner</th>
                    <th>Gala Dinner Total</th>
                    <th>Room Tarrif</th>
                    <th>No of Days</th>
                    <th>Room Dates</th>
                    <th>Person</th>
                    <th>Room Tarrif Price</th>
                    <th>Room Tarrif Total</th>
                    <th>Hands on Training Courses</th>
                    <th>Hands on Training Courses Total</th>
                    
                @elseif($option == 4)
                    <th>Become Aris Member</th>
                @elseif($option == 1)
                    <th>Gala Dinner</th>
                    <th>Gala Dinner Total</th>
                @elseif($option == 2)
                    <th>Room Tarrif</th>
                    <th>No of Days</th>
                    <th>Room Dates</th>
                    <th>Person</th>
                    <th>Room Tarrif Price</th>
                    <th>Room Tarrif Total</th>
                @elseif($option == 3)
                    <th>Hands on Training Courses</th>
                    <th>Hands on Training Courses Total</th>
                @endif
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($members) && !empty($members))
                @foreach($members as $key=>$member)
                <tr>
                    <td style="text-align: center!important;">{{$key + 1}}</td>
                    <td style="text-align: center!important;">{{ isset($member->id) && !empty($member->id) ? 'RHIN'.'0000'.$member->id : 'RHIN'.'0000'.$member->id }}</td>
                    <td style="text-align: center!important;">{{ strtoupper($member->category) }}</td>
                    <td style="text-align: center!important;">{{ isset($member->name) && !empty($member->name) ? $member->name : '' }}</td>
                    <td style="text-align: center!important;">{{$member->code .' '. $member->mobile}}</td>
                    <td style="text-align: center!important;">{{$member->email}}</td>
                    <td style="text-align: center!important;">{{$member->medical_reg_no}}</td>
                    <td style="text-align: center!important;">{{$member->designation}}</td>
                    <td style="text-align: center!important;">{{$member->institute}}</td>
                    <td style="text-align: center!important;">{{$member->address}}</td>
                    <td style="text-align: center!important;">{{$member->city}}</td>
                    <td style="text-align: center!important;">{{$member->state}}</td>
                    <td style="text-align: center!important;">{{$member->pincode}}</td>
                    <td style="text-align: center!important;">{{$member->country}}</td>
                    @php
                        $plan = App\Models\Plan::where('id', $member->plan_id)->first();
                        $overall_total = 0;
                        $overall_tax = 0;
                        $overall_total += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
                        $overall_tax += isset($plan->amount) && !empty($plan->amount) ? (float)$plan->amount : 0;
                        $overall_total += isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) ? (float)$member->become_aris_member_price : 0; 
					@endphp
                    <td style="text-align: center!important;">{{isset($plan->category) ? strtoupper($plan->category) : ''}}<br/>{{ isset($plan->start_date) && !empty($plan->start_date) ? date('d M, Y', strtotime($plan->start_date)) : '' }}</td>
                    <td style="text-align: center!important;">{{$plan->amount}}</td>
                    <td style="text-align: center!important;">
                        {{ $plan->amount + ($plan->amount * 18/100) }} <br/>
                        Price : {{$plan->amount}} - Tax {{($plan->amount * 18/100)}} = {{ $plan->amount + ($plan->amount * 18/100) }}
                    </td>
                    
                    @if(isset($option) && !empty($option) && $option == 'all')
                            @if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) && $member->become_aris_member_price != 0.00)
                                <td style="text-align: center!important;">{{$member->become_aris_member_price}}</td>
                            @else
                            <td></td>
                            @endif
                        
                            @if(isset($member->package) && !empty($member->package))
                                @foreach($member->package as $package)
                                @php
                                    $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
                                    $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0; 
                                    $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
                                @endphp
                                @if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price != 0.00)
                                <td style="text-align: center!important;">Gala Dinner</td>
                                <td style="text-align: center!important;">{{$package->gala_dinner_price}}</td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
    
                                @if(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price != 0.00)
                                    <td style="text-align: center!important;">{{ $package->room_tarrif }}</td>
                                    <td style="text-align: center!important;">{{ $package->no_of_days }}</td>
                                    <td style="text-align: center!important;">{{ $package->room_dates }}</td>
                                    <td style="text-align: center!important;">
                                        @php $person = isset($package->person) ? json_decode($package->person) : []; @endphp
                                        <p>{{ $member->id }} ,{{ $member->name }}, {{ $member->mobile }}</p>
                                        <p>{{ isset($person['register_no']) ? $person['register_no'] : '' }}, {{ isset($person['name']) ? $person['name'] : '' }}, {{ isset($person['mobile']) ? $person['mobile'] : '' }}</p>
                                    </td>
                                    <td style="text-align: center!important;">{{$package->room_tarrif_price}}</td>
                                    <td style="text-align: center!important;">{{ $package->room_tarrif_price + $package->room_tarrif_tax }}</td>
                                @else
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                @endif
    
                                @if(isset($package->training) && !empty($package->training))
                                    @php
                                        $training = explode(',',$package->training);
                                        $overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
    							        $overall_tax += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
                                    @endphp
                                    <td style="padding:10px;" align="centre">{{ $package->training }}</td>
                                    <td style="padding:10px;" align="centre">{{ count($training) * 1000 }}</td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
                                
                            @endforeach
                        @endif
                    @elseif($option == 4)
                        @if(isset($member->become_aris_member_price) && !empty($member->become_aris_member_price) && $member->become_aris_member_price != 0.00)
                            <td style="text-align: center!important;">{{$member->become_aris_member_price}}</td>
                        @else
                            <td></td>
                        @endif
                    @elseif($option == 1)
                        @if(isset($member->package) && !empty($member->package))
                            @foreach($member->package as $package)
                                @php
                                    $overall_total += isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) ? (float)$package->gala_dinner_price : 0;
                                @endphp
                                @if(isset($package->gala_dinner_price) && !empty($package->gala_dinner_price) && $package->gala_dinner_price != 0.00)
                                <td style="text-align: center!important;">Gala Dinner</td>
                                <td style="text-align: center!important;">{{$package->gala_dinner_price}}</td>
                                @else
                                <td></td>
                                <td></td>
                                @endif
                            @endforeach
                        @endif
                    @elseif($option == 2)
                        @if(isset($member->package) && !empty($member->package))
                                @foreach($member->package as $package)
                                @php
                                    $overall_total += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0; 
                                    $overall_tax += isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) ? (float)$package->room_tarrif_price : 0;
                                @endphp
                                
    
                                @if(isset($package->room_tarrif_price) && !empty($package->room_tarrif_price) && $package->room_tarrif_price != 0.00)
                                    <td style="text-align: center!important;">{{ $package->room_tarrif }}</td>
                                    <td style="text-align: center!important;">{{ $package->no_of_days }}</td>
                                    <td style="text-align: center!important;">{{ $package->room_dates }}</td>
                                    <td style="text-align: center!important;">
                                        @php $person = isset($package->person) ? json_decode($package->person) : []; @endphp
                                        <p>{{ $member->id }} ,{{ $member->name }}, {{ $member->mobile }}</p>
                                        <p>{{ isset($person['register_no']) ? $person['register_no'] : '' }}, {{ isset($person['name']) ? $person['name'] : '' }}, {{ isset($person['mobile']) ? $person['mobile'] : '' }}</p>
                                    </td>
                                    <td style="text-align: center!important;">{{$package->room_tarrif_price}}</td>
                                    <td style="text-align: center!important;">{{ $package->room_tarrif_price + $package->room_tarrif_tax }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif
    
                            @endforeach
                        @endif
                    @elseif($option == 3)
                        @if(isset($member->package) && !empty($member->package))
                            @foreach($member->package as $package)
                                
                                @if(isset($package->training) && !empty($package->training))
                                    @php
                                        $training = explode(',',$package->training);
                                        $overall_total += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
    							        $overall_tax += isset($training) && !empty($training) ? (float)(count($training) * 1000) : 0;
                                    @endphp
                                    <td style="padding:10px;" align="centre">{{ $package->training }}</td>
                                    <td style="padding:10px;" align="centre">{{ count($training) * 1000 }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif
                                
                            @endforeach
                        @endif
                    @endif
                    
                    <td>{{ isset($member->created_at) && !empty($member->created_at) ? date('d M, Y h:i:A',strtotime($member->created_at)) : '' }}</td>
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>
</html>
