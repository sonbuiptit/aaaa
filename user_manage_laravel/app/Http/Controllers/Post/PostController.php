<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\user;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $post = post::all();
        return view('Post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post();
        $validatedData = $request->validate([
            'postName'=>'required',
            'ontent'=>'required',
            'id'=>'required'
        ],[
            'postName.required'=>'PostName không được để trống',
            'ontent.required'=>'Content không được để trống',
            'id.required'=>'id không được để trống'
        ]);
        if ($validatedData != null){
            $post->postName = $request->postName;
            $post->content =$request->ontent;
            $post->id = $request->id;
            $checkPost = user::find($post->id);
            if ($checkPost == null){
                return redirect('Post/add')->with('thông báo', 'id không hợp lệ');
            }else{
                $post->save();
                return redirect('Post/add')->with('thông báo', 'Thêm thành công');
            }
        }else
            return view('Post.create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function show(int $postId)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function edit($postId)
    {

        $post = post::where('postId', $postId)->first();

        return view('Post.update', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $postId)
    {

        $post = post::where('postId', $postId)->first();
        $post->postName = $request->postName;
        $post->content = $request->ontent;
        $post->id = $request->id;
        $checkPost = user::find($post->id);
        if ($checkPost == null){
            return redirect('Post/update/'.$postId)->with('thongbao', 'id không hợp lệ');
        }else{
            $post->save();
            return redirect('Post/update/'.$postId)->with('thongbao', 'update thanh công');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $postId
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $postId)
    {

        $post = post::where('postId', $postId)->first();
        $post->delete();
        return redirect('Post/list')->with('thongbao', 'bạn dã xóa thành công');
    }


}

