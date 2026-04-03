<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abstract Export</title>
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
        <th>Registration ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Category 1</th>
        <th>Category 2</th>
        <th>Category 3</th>
        <th>Category 4</th>
        <th>Category 5</th>
        <th>Date</th>
    </tr>
</thead>
<tbody>
@if(isset($members) && !empty($members))
    @foreach($members as $m)
        @php
            // Decode categories JSON
            $categories = !empty($m->catergory_id) ? json_decode($m->catergory_id) : [];
    $abstracts = [
                'Dr.I.S.Gupta Award presentation for Senior Consultant',
                'Mrs.Neena Saharia Award presentation for Junior Consultant',
                'Dr. Adesh Saxena and Dr.Mita Saxena Award presentation for Post Graduate',
                'Dr. Arvind Soni Award - Video Session',
                'Dr. Anoop Raj Award - Poster Session',
            ];
        @endphp
        <tr>
            <td>
                <span class="text-primary font-w600">
                    {{ isset($m->id) ? 'RHIN'.sprintf('%04d', $m->id) : '--' }}
                </span>
            </td>
            <td>{{ $m->name ?? '' }}</td>
            <td>{{ $m->email ?? '' }}</td>

                   @foreach($abstracts as $key => $award)
                <td>
                   @if(in_array($award, $categories))
                    Award:<strong>{{ $award }}</strong><br>
                   <b> Title: </b> {{ $m->{'title_'.$key} }}<br>
                   <b>Content:</b>
                   @if(!empty($m->{'note_'.$key}))
                        {{ $m->{'note_'.$key} }}
                    @elseif(!empty($m->note))
                        {{ $m->note }}
                    @endif
                @endif
                </td>
           @endforeach

            <td>{{ isset($m->created_at) ? date('M d, Y', strtotime($m->created_at)) : '--' }}</td>
        </tr>
    @endforeach
@endif
</tbody>

                                 </table>
</body>
</html>
