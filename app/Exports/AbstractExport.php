<?php

namespace App\Exports;

use App\Models\TAbstract;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Carbon\Carbon;

class AbstractExport implements FromView, WithColumnWidths
{
   
    public function view(): View
    {
      
        $members = TAbstract::where('status', 1);
        $members = $members->orderBy('id','desc')->get();
        return view('admin.abstract.export', ['members' => $members]);
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 10,
            'C' => 25,
            'D' => 25,
            'E' => 25,
            'F' => 25,            
            'G' => 25,
            'H' => 25,
            'I' => 25,
            'J' => 25,
            'K' => 25,
            'L' => 25,
            'M' => 25,
            'N' => 25,
            'O' => 25,
            'P' => 25,
            'Q' => 25,
            'R' => 25,
            'S' => 25,
            'T' => 25,
            'U' => 25,
            'V' => 25,
            'W' => 25,
            'X' => 25,
            'Y' => 25,
            'Z' => 25,
            'AA' => 25,
            'AB' => 25,
            'AC' => 25,
            'AD' => 25,
            'AE' => 25,
            'AF' => 25,
            'AG' => 25,
            'AH' => 25,
            'AI' => 25,
            
        ];
    }
}