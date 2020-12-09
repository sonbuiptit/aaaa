<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\Array_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = App\Models\user::all();
        $user = user::all()->sortBy('age');
        foreach ($user as $us){
            $count= DB::table('user')->select('id','name')->join('post', 'post.id', '=', 'user.id')
                ->where('post.id', $us->id)->count();
            $data[] = $count;
        }
        return view('User.index', compact('user', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('User/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new user();
        $validatedData = $request->validate([

            'name'=>'required|unique:user',
            'age'=>'required',
            'password'=>'required'
        ],[

            'name.required'=>'tên không được để trống',
            'name.unique'=>'Tên đã có',
            'age.required'=>'Tuổi không được để trống',
            'password.required'=>'Mật khẩu không được để trống'
        ]);

        if ($validatedData != null){
            $name = $request->name;
            $check = DB::table('user')->where('name','=', $name)->count();
            if ($check == 0){
                $user->name = $name;
                $user->age = $request->age;
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('UserList')->with('thongbao', ' Thêm User thành công');
            }else{
                return view('User.creat');
            }
        }
        else{
            return view('User.creat');
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = user::find($id);
        return view('User.update', compact('user'));
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
        $user = user::find($id);
        $user->name = $request->name;
        $user->age = $request->age;

        $user->save();
        return redirect('User/update/'.$id)->with('thongbao', 'update thanh công');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = user::find($id);

        $post = post::where('id', $id)->first();
        if ($post != null){
            $post->delete();
        }

        $user->delete();

        return redirect('User/list')->with('thongbao', 'bạn dã xóa thành công');
    }

    public function numberPost(){

    }

    public function setCookie(){

        $response = new Response();
        $response->withCookie('Ten','Sơn',1);
        echo 'đã setCookie';
        return $response;
    }

    public function getCookie(Request $request){
        return $request->cookie('Ten');
    }

    public function getLogin(){
            return view('DangNhap');
    }

    public function postLogin(Request $request){
        $userName =  $request->name;
        $password = $request->password;

        if (Auth::attempt(['name' =>$userName, 'password'=>$password])){
            return redirect()->route('UserList');
        }else
            return redirect('login')->with('error', 'Đăng nhập không thành công');

    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
