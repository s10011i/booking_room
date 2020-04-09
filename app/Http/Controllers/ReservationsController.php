<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Reservation;
use App\Room;
// use App\User;

class ReservationsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Room $room, Request $request){
        // $flight = App\Flight::where('number', 'FR 900')->first();
        $request->validate([
            'description'=>'required|min:7',
            'starts'=>'required|date',
            'ends'=>'required|date|after:starts'
        ]);
        // dd($request->ends);
        $reservation=new Reservation;
        $reservation->user_id=Auth::user()->id;
        $reservation->room_id=$room->id;
        $reservation->description=$request->description;
        $reservation->starts=$request->starts;
        $reservation->ends=$request->ends;
        if($reservation->save()){
            return "<script>window.alert('Reservation sucseeded!')
        window.location='/rooms'</script>";
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
    public function update(Request $request, $id){
        
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
}
