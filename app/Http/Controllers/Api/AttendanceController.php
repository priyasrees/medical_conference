<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    
    public function scan(Request $request)
    {
        // Validate request
        $request->validate([
            'qr_text' => 'required|string'
        ]);
        
         $qrText = $request->qr_text;
         preg_match('/\d+/', $qrText, $matches);
         $registerId = ltrim($matches[0], '0');
        // $registerId = trim($request->register_id);

        // Find user by register code
        $user = Member::where('id', $registerId)->first();

        if (!$user) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'User not found.'
            ], 404);
        }

        // Check if attendance already exists for this user (ONE TIME ONLY)
        $attendance = Attendance::where('member_id', $user->id)->first();

        if ($attendance) {
            return response()->json([
                'status' => 'already',
                'message' => 'Attendance already taken.',
                'name' => $user->name,
                'register_id' => $user->id
            ], 200);
        }

        // Create attendance ONCE
        Attendance::create([
            'member_id' => $user->id,
            'status' => 'present',
            'scanned_at' => now()
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Attendance taken successfully.',
            'name' => $user->name,
            'register_id' => $user->id
        ], 201);
    }
}
