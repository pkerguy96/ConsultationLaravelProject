<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Consultation;
use App\Models\Project;

class AdminProfileController extends Controller
{
    public function ProfileView()
    {
        $id = Auth::user()->id;
        $data = admin::find($id);
        return view('admin.admin_profile', compact('data'));
    }
    public function updateAdmin(request $request)
    {
        $id = $request->admin_id;
        admin::findorfail($id)->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,

        ]);
        $notification = array(
            'message' => 'Consultation Sucess  ',
            'alert-type' => 'success'
        );
        return view('dashboard')->with($notification);
    }
    public function UpdateSettings()
    {
        return view('admin.admin_settings');
    }
    public function UpdatePassword(Request $request)
    {
        $hashedpassword = auth::user()->password;
        if (hash::check($request->old_password, $hashedpassword)) {
            $admin = admin::find(auth::id());
            $admin->password = hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
    public function ViewAdmins()
    {
        $admins = admin::all()->except(Auth::id());
        return view('admin.admin_list', compact('admins'));
    }
    public function ViewAppointments()
    {
        return view('admin.admin_appointments');
    }
    public function scheduleViewAjax()
    {
        $data = Consultation::latest()->get();
        return response()->json(array(
            'data' => $data,
        ));
    }
    public function ViewProjects()
    {
        $data =  Project::latest()->get();
        return view('admin.admin_projects', compact('data'));
    }
    public function Addadmin()
    {
        return view('admin.admin_new');
    }
    public function Createadmin(request $request)
    {
        $password = hash::make($request->password);
        admin::insert([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $password,

        ]);
        $notification = array(
            'message' => 'Admin added with Sucess  ',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.list')->with($notification);
    }
    public function Modifyadmin($id)
    {
        $data = admin::findorfail($id);
        return view('admin.admin_modify', compact('data'));
    }
    public function ModifierAdmin(request $request)
    {
        $id = $request->admin_id;
        admin::findorfail($id)->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        $notification = array(
            'message' => 'Admin Modified with Sucess  ',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.list')->with($notification);
    }
    public function DeleteAdmin($id)
    {
        admin::findorfail($id)->delete();
        $notification = array(
            'message' => 'Admin Deleted with Sucess  ',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.list')->with($notification);
    }
}
