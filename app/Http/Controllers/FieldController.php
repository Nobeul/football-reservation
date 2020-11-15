<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Field;
use App\Country;
use Mail;
use App\Mail\SendMail;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data['fields'] = Field::with('country')->get();

        return view('admin.field.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        return view('admin.field.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = new Field;
        $field->name = $request->name;
        $field->country_id = $request->country_id;
        $field->save();

        return redirect('/fields');
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
        $data['field'] = Field::where('id', $id)->first();
        $data['countries'] = Country::all();
        
        return view('admin.field.edit', $data);
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
    public function delete($id)
    {
        $field = Field::where('id', $id);
        $field->delete();

        return back();
    }
    
    public function sendMail()
    {
        Mail::send(new SendMail());
    }
}
