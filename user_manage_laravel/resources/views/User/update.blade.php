
<h3>Update User</h3>
@if(session('thongbao'))
    <div class="alter alter-success">
        {{session('thongbao')}}
    </div>
@endif
<a href="http://localhost:8000/user_manage_laravel/public/User/list">danh sách</a>
<form action="{{$user->id}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="name" value="{{$user->name}}">
    <input type="text" name="age" value="{{$user->age}}">
    <input type="submit" name="update user" value="Update">
</form>
