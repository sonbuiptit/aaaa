@extends('layout.master')
@section('title', 'User Manage')
@section('ListUser')
    <button><a href="{{route('logout')}}">Logout</a></button>
<div class="danhsach">
    <h2> Danh sách user</h2>
    @if(session('thongbao'))
        <div class="alter alter-success">
            {{session('thongbao')}}
        </div>
    @endif
    <table>
        <thead>
        <tr>
            <th>STT</th>
            <th>Name</th>
            <th>Age</th>
            <th>Số post</th>
            <th width="50px"></th>
            <th width="50px"></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $dem = 1;
        ?>
        @foreach($user as $us)

            <tr>
                <td><?php
                    echo $dem;
                    ?></td>
                <td>{{$us->name}}</td>
                <td>{{$us->age}}</td>
                <td>{{$data[$dem -1]}}</td>
                <td><a href="update/{{$us->id}}">Update</a></td>
                <td><a href="destroy/{{$us->id}}">Delete</a></td>
            </tr>
            <?php
            $dem++;
            ?>
        @endforeach
        </tbody>
    </table>
    <br>
    <button><a href="add">Add user</a></button>
</div>
@endsection


