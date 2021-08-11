<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Nette\Utils\Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(Auth::check());
        $title = 'پست ها ';
        $posts = Post::with('user')->get()->sortDesc();

        return view('admin.post.index', compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'نوشتن پست';
        return view('admin.post.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(Auth::check());
        $validated = $request->validate([
            'title' => 'required',
            'pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
            'status' => 'required',

        ]);
        $validated['user_id'] = Auth::user()->id;
        $validated['slug'] = str_replace(' ', '-', $request['title']);
        $image = $request->file('pic');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
//        $image= Image::resize(300,200);

        $image->move(public_path("images"), $new_name);

        $validated['pic'] = $new_name;
        Post::create($validated);

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
        $title='ویرایش پست ها';
        $post=Post::find($id);
        return view('admin.post.edit' , compact('title', 'post'));
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
            'pic' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
            'status' => 'required',

        ]);
        $validated['user_id'] = Auth::user()->id;
        $validated['slug'] = str_replace(' ', '-', $request['title']);
        $image = $request->file('pic');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
//        $image= Image::resize(300,200);

        $image->move(public_path("images"), $new_name);

        $validated['pic'] = $new_name;
        $post=Post::find($id)->update($validated);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back();
    }
}
