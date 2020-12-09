@extends('layout.master')
@section('title','Add Post')
@section('addPost')
<div class="dangkythanhvien">
    <h2>Thêm Post</h2>

    @if(session('thông báo'))
        <div class="alter alter-success">
            {{session('thông báo')}}
        </div>
    @endif
    <a href="http://localhost:8000/user_manage_laravel/public/Post/list">danh sách</a>
    <form action="add" method="post">
        @csrf
        <div>
            <input type="text" name="postName" placeholder="postName">
            @if($errors->has('postName'))
                <div class="alert alert-danger">
                    <strong>{{$errors->first('postName')}}</strong>
                </div>
            @endif

        </div>
        <div>
            <input type="text" name="ontent" placeholder="content">
            @if($errors->has('ontent'))
                <div class="alert alert-danger">
                    <strong>{{$errors->first('ontent')}}</strong>
                </div>
            @endif

        </div>
        <div>
            <input type="text" name="id" placeholder="id">
            @if($errors->has('id'))
                <div class="alert alert-danger">
                    <strong>{{$errors->first('id')}}</strong>
                </div>
            @endif
        </div>

        <input type="submit" name="add post" value="Thêm">
    </form>
</div>
@endsection
