<h3>Update Post</h3>
@if(session('thongbao'))
    <div class="alter alter-success">
        {{session('thongbao')}}
    </div>
@endif
<a href="http://localhost:8000/user_manage_laravel/public/Post/list">danh sách</a>
<form action="{{$post->postId}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="text" name="postName" value="{{$post->postName}}">
    <input type="text" name="ontent" value="{{$post->content}}">
    <input type="text" name="id" value="{{$post->id}}">

    <input type="submit" name="update post" value="Update">
</form>
