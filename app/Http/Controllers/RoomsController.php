<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Room;
use Carbon\Carbon;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $day=Carbon::now();
        if(Auth::check()){
            $rooms=Room::all();
            return view('rooms.index',['rooms'=>$rooms,'day'=>$day]);
        }else{
            // return view('users.create');
            return "<script>window.alert('You have to register/login to see the rooms page!')
        window.location='/users/create'</script>"; 
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('rooms.admin.create');
        
    }
    public function adminPerm(){
        $rooms=Room::all();
        return view('rooms.admin.index',['rooms'=>$rooms]);
    }

    public function noPermission(){
        return view('rooms.admin.nopermission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $request->validate([
            'name'=>'required|min:5|max:255',
        ]);
        $room=new Room;
        $room->name=$request->name;
        if($room->save()){
            return "<script>window.alert('Room added succesfully!!!')
        window.location='/admin'</script>";
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
    public function show(Room $room){
        $day=Carbon::now();
        return view('rooms.show',['room'=>$room,'day'=>$day]);
    }
    public function showDetails(Room $room){
        $day=Carbon::now();
        return view('rooms.show-details',['room'=>$room,'day'=>$day]);
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
    public function update(Room $room){
        $room->update([
            'status'=>request()->has('status')
        ]);
        return redirect()->back();
        // return "<script>window.alert('Changed')
        // window.location='/'</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect('/admin')->with('success','Room deleted');
    }

}
