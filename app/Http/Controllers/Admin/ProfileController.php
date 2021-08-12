<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $title = 'پروفایل کاربری';
        $user = Auth::user();
//        dd($user->toArray());
        return view('admin.profile', compact('title', 'user'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->toArray());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $validated = User::where("id", $id)->update($request->except(['_token', '_method']));
//        return redirect()->back();
//        dd($request->toArray());
        $user = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
            'about_me' => 'required',
            'avatar' => 'required',
        ]);

        $image = $request->file('avatar');
//        dd($image);
        $name_image = $image->getClientOriginalName();
        $new_image = Auth::user()->name . ' ' . $user['first_name'] . time() . $name_image;
        $str_v = str_replace(' ', '-', $new_image);
        $image->move(public_path('assets/img/users'), $str_v);
        $user['avatar']=$str_v;
        $users=User::find($id)->update($user);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
