<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Country;
use App\Slot;
use App\Reservation;

class SlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fields'] = Field::with('country')->get();

        return view('admin.slots.field_list', $data);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($field_id)
    {
        $data['slots'] = Slot::where('field_id', $field_id)->get();
        $data['field'] = Field::with('country')->where('id', $field_id)->first();
        $data['reservations'] = Reservation::where('field_id', $field_id)->first();

        return view('admin.slots.list', $data);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view($slot_id)
    {
        $data['totalSeat'] = Slot::where('id', $slot_id)->value('total_seat');
        $data['field'] = Slot::where('id', $slot_id)->value('field_id');
        $reservations = Reservation::where('field_id', $slot_id)->get();
        $data['reservedSeats'] = array();
        foreach ($reservations as $reservation) {
             array_push($data['reservedSeats'], $reservation->reserved_seat);
        }
        $data['seatPrice'] = Slot::where('id', $slot_id)->value('seat_price');
        
        return view('admin.slots.view', $data);

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
    public function store(Request $request)
    {
        //
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

    public function paypal() {
        return view('admin.slots.paypal');
    }
}
