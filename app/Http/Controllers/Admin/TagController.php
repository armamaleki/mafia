<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'تک های شما';
        return view('admin.tags.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'اضافه کردن تگ';
        return view('admin.tags.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'pic' => 'required',
        ]);

        $tag['slug'] = str_replace(' ', '-', $request['title']);
        $image = $request->file('pic');
        $name = $image->getClientOriginalName();
        $exploade = explode('.', $name);
        $end = end($exploade);
        $username = Auth::user()->name;
        $new_name = $username . ' ' . $tag['title'] . time() . '.' . $end;
        $str = str_replace(' ', '-', $new_name);
//        dd($str);
        $image->move(public_path('assets/img/tags'), $str);
        $tag['pic'] = $str;
        if ($request) {
            $tag['post_id']='2';
        }
        else{
            $request['post_id']= 'post_id';
        }
//        dd($request->toArray());
        $tags=Tag::create($tag);
        return redirect()->back();
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
        //
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
