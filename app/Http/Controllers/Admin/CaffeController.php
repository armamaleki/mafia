<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caffe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CaffeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'کافه های برگذار کننده رویداد';
        $caffes = Caffe::with('user')->paginate(20);

        return view('admin.caffe.index', compact('title', 'caffes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='اضافه کردن کافه جدید';
        return view('admin.caffe.create' , compact('title'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;
        $caffe = Caffe::create($validated);
        return redirect()->route('caffe.edit', $caffe->id);
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
        $caffe = Caffe::find($id);
        return view('admin.caffe.edit', compact('caffe'));
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

        $validated = $request->validate([
            'title' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);
        $validated['user_id'] = Auth::user()->id;

        $caffe = Caffe::find($id)->update($validated);

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
        $cafe = Caffe::find($id);
//
        $cafe->delete();
        return redirect()->back();
    }
}
