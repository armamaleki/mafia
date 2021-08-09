<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Caffe;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'منو کافه ها';
        $menus = Menu::with('caffe')->get()->sortDesc();
        return view('admin.menu.index', compact('title', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'ساخت منو تازه';
        return view('admin.menu.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->toArray());
        $menu = $request->validate([
            'product' => 'required',
            'product_discretion' => 'required',
            'product_pic' => 'required',
            'image' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $menu['caffe_id'] = Auth::user()->id;

        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $new_name = time() . $name;
        $image->move(public_path('assets/img/menu'), $new_name);


        $image = $request->file('product_pic');
        $name = $image->getClientOriginalName();
        $product_pic_name = time() . $name;
        $image->move(public_path('assets/img/product_pic'), $product_pic_name);

        $menu['image'] = $new_name;
        $menu['product_pic'] = $product_pic_name;

//        dd($menu);
        $menu=Menu::create($menu);
        return redirect()->route('menu.edit',$menu->id);
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
//        dd($id);
        $title='ادیت کردن';
        $menus=Menu::find($id);
        return view('admin.menu.edit' , compact('title' ,'menus'));
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
//        dd($request->toArray());
        $menu = $request->validate([
            'product' => 'required',
            'product_discretion' => 'required',
            'product_pic' => 'required',
            'image' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $menu['caffe_id'] = Auth::user()->id;

        $image = $request->file('image');
        $name = $image->getClientOriginalName();
        $new_name = time() . $name;
        $image->move(public_path('assets/img/menu'), $new_name);


        $image = $request->file('product_pic');
        $name = $image->getClientOriginalName();
        $product_pic_name = time() . $name;
        $image->move(public_path('assets/img/product_pic'), $product_pic_name);

        $menu['image'] = $new_name;
        $menu['product_pic'] = $product_pic_name;

//        dd($menu);
        $menu=Menu::find($id)->update($menu);
        return redirect()->route('menu.index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu =Menu::find($id);
        $menu->delete();
        return redirect()->back();
    }
}
