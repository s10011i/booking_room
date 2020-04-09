<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;

class UsersController extends Controller{
    
    public function login(Request $request){
        $request->validate([
        'email' => 'required|email|max:255',
        'password' => 'required|max:255'
        ]);
        // dd($request->password);
        if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])){
            // dd('passed');
            return redirect()->intended('/rooms')->with('Status','You are logged in');
        }else{
            return redirect()->back();
        }
//         if (Auth::guard('admin')->attempt($credentials)) {
//     //
// }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users|max:255',
            'password'=>'required|max:255',
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=$request->password;
        $user->password=bcrypt($user->password);
        if($user->save()){
            return "<script>window.alert('Thanks for registration. Now you can login!')
        window.location='/users'</script>";
        }else{
            return redirect()->back();
        }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        // return redirect()->back();
        return redirect()->route('home');
    }
}
