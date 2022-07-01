<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Carbon;
use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function ViewProject()
    {
        return view('frontend.project_create');
    }
    public function SaveProject(request $request)
    {
        Project::insert([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "project_type" => $request->project_type,
            "mesure_visite" => $request->mesure_visite,
            "factory_visite" => $request->factory_visite,
            "whatsapp_contact" => $request->whatsapp_contact,
            "created_at" => carbon::now(),
        ]);
        $notification = array(
            'message' => 'Project Inserted With Sucess  ',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
