@extends('layout.master')
@section('title', 'Add User')
@section('addUser')
   <div class="dangkythanhvien">
       <h2>Thêm User</h2>

       <a href="http://localhost:8000/user_manage_laravel/public/User/list">danh sách</a>
       <form action="" method="post">
           @csrf
           <table>
               <tr>
                   <td>Name :</td>
                <td>
                    <input type="text" name="name" placeholder="Name">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </td>
               </tr>
               <tr>
                <td>Age :</td>
                <td>
                    <input type="text" name="age" placeholder="Age">
                    @error('age')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </td>
               </tr>
               <tr>
                   <td>Password :</td>
                   <td>
                       <input type="text" name="password" placeholder="Password">
                       @error('password')
                       <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                   </td>
               </tr>
           </table>
           <input type="submit" name="add user" value="Thêm">
       </form>
   </div>
@endsection
