<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Session;
use  Carbon\Carbon;
use App\Models\Consultation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultationController extends Controller
{

    public function insertConsultation(request $request)
    {
        $validatedata = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'project_type' => 'required',
            'date' => 'required',
            'hour' => 'required',

        ]);

        if ($request->date > carbon::now()) {
            Consultation::insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'project_type' => $request->project_type,
                'date' => $request->date,
                'hour' => $request->hour,
                'created_at' => carbon::now(),
            ]);
            $notification = array(
                'message' => 'Consultation Sucess  ',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Consultation Denied  ',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
