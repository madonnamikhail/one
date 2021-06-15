<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    //
    public function index($subdomain)
    {
        return "m";
        $users = User::with('locations')
        // ->whereSubdomain('name','=',$subdomain)
            ->firstOrFail();
        
        return view('user.locations', compact ('users'));
    }

    public function create(){
        return view('user.create');
    }
    public function store(Request $request){
        $rules=[
            "name"=>"required|max:25",
            "username"=>"required|max:25",
            "email"=>"required|email|unique:users,email",
            // "password"=>"required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
        ];
        $request->validate($rules);
        $data=$request->except('_token','password');
        $data['password']=Hash::make($request->password);
        $data['email_verified_at']= Carbon::now()->toDateTimeString();
        User::insert($data);
        return redirect()->back()->with('Success','The provider has been added successfully');
    }

    public function showLocation()
    {
        // $role = Role::create(['name' => 'provider']);
        // $permission = Permission::create(['name' => 'show artical']);
        // $role=Role::find(1);
        // $permission=Permission::find(1);
        // $role->givePermissionTo($permission);
        // auth()->user()->assignRole('provider');
        $user_id = Auth::user()->id;
        // return $user_id;
        $users = User::with('locations')->where('id','=',$user_id)->get();
        return view('user.locations', compact ('users'));
    }
    public function allUsers()
    {
        $allusers=User::get();
        return view('user.show',compact('allusers'));
    }
}
