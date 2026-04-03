<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hands On Training Export</title>
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
    <table id="example" class="display table" style="overflow-y:auto;">
<thead>
    <tr>
        <th>Membership ID</th>
        <th>Name</th>
        <th>Mobile Number</th>
        <th>Training Courses</th>
    </tr>
</thead>
<tbody>
                                        @if(isset($members) && !empty($members))
                                        @foreach($members as $m)
                                        @if(isset($m->training) && !empty($m->training))
                                        @php 
                                            $category = App\Models\Member::where('id', $m->member_id)->pluck('category')->first();
                                            if($category == 'pg-students'){
                                            	$category = str_replace("pg-students","pg-student",$category);
                                            }
                                        @endphp
                                        <tr>
                                            <td>{{ isset($m->id) && !empty($m->id) ? 'RHIN'.'0000'.$m->id : 'RHIN'.'0000'.$m->id }}</td>
                                            <td>{{ $m->name }}</td>
                                            <td>{{ $m->code.' '.$m->mobile }}</td>
                                            <td>
                                                <ul>
                                                @foreach(explode(',', $m->training) as $t)
                                              <li><span style="font-weight:bold;">{{ $loop->iteration }}.</span> {{ $t }}</li>

                                                @endforeach
                                                </ul>
                                            </td>
                                            
                                        </tr>
                                        @endif
                                        @endforeach
                                        
                                        @endif                                    
                                    </tbody>

                                 </table>
</body>
</html>
