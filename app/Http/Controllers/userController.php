<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Response,DB;
use App\Role;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:admin|super_admin,user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at','asc')->paginate(10);
        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            return view('users.index',[
                'users' => $users
            ]);
        }
        else
        {
            return view('error');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            
            return view('users.create', [
                'user' => $user
            ]);
        }
        else
        {
            return view('error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
                "name" => $request->name,
                "username" => $request->username,
                "email" => $request->email,
                "password" => Hash::make($request->password),
            ]
        );
        $user->attachRole('user'); 

        if ($user)
        {
            $request->session()->flash("success" , "تم إضافة المدرسة بنجاح");
        }
        else
        {
            $request->session()->flash("error","عذرا حدث خطأ ما!");
        }

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $roles  = Role::all();
        $user   = User::where('id', $id)->with('roles')->first();

       /* $user = DB::table('users')
                        ->join('role_user','users.id','=','role_user.user_id')
                        ->join('roles','role_user.role_id','=','roles.id')
                        ->where('id',$id)->get();*/

        $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {  
            return view('users.edit',[
                'user' => $user,
                'roles' => $roles,
            ]);
        }
        else
        {
            return view('error');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $user->name    = $request->name;
        $user->username  = $request->username;
        //$user->password = $request->password;
        if($request->input('password'))
        {
          $user->password = Hash::make($request->password);
        }
        $user->syncRoles($request->roles);

        if ($user->update())
        {
            
            $request->session()->flash("success" , "تم تعديل المستخدم بنجاح");
        }
        else
        {
            $request->session()->flash("error","ذرا حدث خطأ ما!");
        }

        return redirect()->route("users.index");    

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
            //find user by id
            $user = User::find($id);
            //check if this user exist
            $id = Auth::user()->id;
        if(Auth::user()->hasRole('super_admin') || Auth::user()->hasRole('admin'))
        {
            if($user)
            {
                //find user id in role table
                $user_id = DB::Table('role_user')->select('role_user.user_id')->where('user_id',$user);
                //check if this user has role
                if($user_id)
                {
                    //delete the role of this user
                    $user_id->delete();
                    //delete user
                    if($user->delete())
                    {
                        //delete the relation between visit and user from user_visit table after delete visit
                        User_Visitor::where("user_id",$user->id)->get()->map(function ($item){
                            $item->delete();
                        });
                    } 
                }
                
            }
            
            return Response::json($user);
        }
        else
        {
            return view('error');
        }
    }
    
}
