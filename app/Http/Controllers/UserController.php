<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Country;
use App\State;
use App\City;
use App\Role;
use App\File;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $data['img'] = [];
        $data['users'] = User::get();
        $data['profileImage'] = $profileImage = User::leftJoin('files', 'users.id', 'files.object_id')
                                ->where('object_type','profile-image')
                                ->get();
        foreach($profileImage as $image) {
            array_push($data['img'], $image->object_id);
        }
        $data['img'] = array_filter($data['img']);

        return view('admin.user.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['countries'] = Country::all();
        $data['states'] = State::all();
        $data['cities'] = City::all();
        $data['roles'] = Role::all();
        return view('admin.user.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->country_id = $request->country_id;
        $user->role_id    = $request->role_id;
        $user->mobile     = $request->mobile;
        $user->is_active  = $request->is_active;
        $user->gender     = $request->gender;
        $user->password   = bcrypt($request->password);
        $user->save();
        if ($request->hasFile('profile_image')) {
            $fileName = $request->file('profile_image')->getClientOriginalName();
            $request->profile_image->storeAs('profile-images', $fileName, 'public');
            File::uploadImage('profile-image', $user->id, $fileName);
        }

        return redirect()->route('user.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view($id)
    {
        $data['user'] = User::where('id', $id)->first();
        return view('admin.user.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user']           = User::where('id', $id)->first();
        $data['countries']      = Country::all();
        $data['states']         = State::all();
        $data['cities']         = City::all();
        $data['roles']          = Role::all();
        $data['profileImage']   = File::where(['object_type'=>'profile-image','object_id'=>$id])->value('file_name');
        if ($data['profileImage'] == null) {
            $data['profileImage'] = $data['user']->gender;
        }

        return view('admin.user.edit', $data);
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
        $user = User::where('id', $id)->first();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->country_id = $request->country_id;
        $user->role_id    = $request->role_id;
        $user->mobile     = $request->mobile;
        $user->is_active  = $request->is_active;
        $user->gender     = $request->gender;
        $user->password   = bcrypt($request->password);
        $user->save();
        if ($request->hasFile('profile_image')) {
            $fileName = $request->file('profile_image')->getClientOriginalName();
            File::uploadImage('profile-image', $user->id, $fileName, $id);
            $request->profile_image->storeAs('profile-images', $fileName, 'public');
        }
        return redirect()->back();
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
