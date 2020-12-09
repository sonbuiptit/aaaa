@extends('layout.master')
@section('title', 'Post Manage')
@section('ListPost')
<div class="danhsach">
    <h2> Danh sách post</h2>
    @if(session('thongbao'))
        <div class="alter alter-success">
            {{session('thongbao')}}
        </div>
    @endif
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Post Name</th>
            <th>Content</th>
            <th>ID</th>
            <th width="50px"></th>
            <th width="50px"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $dem = 1;
        ?>
        @foreach($post as $ps)

            <tr>
                <td><?php
                    echo $dem;
                    ?></td>
                <td>{{$ps->postName}}</td>
                <td>{{$ps->content}}</td>
                <td>{{$ps->id}}</td>
                <td><a href="update/{{$ps->postId}}">Update</a></td>
                <td><a href="destroy/{{$ps->postId}}">Delete</a></td>
            </tr>
            <?php
            $dem++;
            ?>
        @endforeach

        </tbody>
    </table>
    <br>
    <button><a href="http://localhost:8000/user_manage_laravel/public/Post/add">Add post</a></button>
</div>
@endsection


