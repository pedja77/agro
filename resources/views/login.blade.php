@extends('layouts.master')

@section('content')
<div class="row mt-5 pt-5">
    <div class="col-6 offset-md-3 mt-5 pt-5">

        <form method="POST" action="/login">

            {{ csrf_field() }}

        <div class="form-group">
            <label for="emil_choveka">Email</label>
            <input id="emil_choveka" name="emil_choveka" placeholder="Email" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="user_pwd">Password</label>
            <input id="user_pwd" name="user_pwd" placeholder="Password" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-outline-success">Login</button>
        </div>
        </form>

    </div>
</div>

@endsection
