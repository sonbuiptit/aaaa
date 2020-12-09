@extends('layout.master')
@section('title', 'Login')
@if(session('error'))
    <div class="alter alter-success">
        {{session('error')}}
    </div>
@endif
<form action="login" method="post">
    @csrf
    <input type="text" name="name" placeholder="userName">
    <input type="text" name="password" placeholder="password">
    <input type="submit" value="Đăng Nhập">
</form>
