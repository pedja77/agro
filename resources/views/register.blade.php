@extends('./layouts/master')

@section('content')
<div class="row mt-5 pt-5">
    <div class="col-6 offset-md-3 mt-5 pt-5">

        <form method="POST" action="/register">

            {{ csrf_field() }}

        <div class="form-group">
            <label for="ime_choveka">First name</label>
            <input id="ime_choveka" name="ime_choveka" placeholder="First name" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="prezime_choveka">Last name</label>
            <input id="prezime_choveka" name="prezime_choveka" placeholder="Last name" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="telefon_choveka">Phone number</label>
            <input id="telefon_choveka" name="telefon_choveka" placeholder="Phone number" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="ulica_i_broj_choveka">Street address</label>
            <input id="ulica_i_broj_choveka" name="ulica_i_broj_choveka" placeholder="Street address" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="grad_choveka">City</label>
            <input id="grad_choveka" name="grad_choveka" placeholder="City" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="post_broj_choveka">ZIP code</label>
            <input id="post_broj_choveka" name="post_broj_choveka" placeholder="ZIP code" type="text" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <div>
            @include('partials.countries')
            </div>
        </div>
        <div class="form-group">
            <label for="emil_choveka">Email</label>
            <input id="emil_choveka" name="emil_choveka" placeholder="Email" type="email" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" placeholder="Password" type="password" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm password</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Confirm password" type="password" required="required" class="form-control here">
        </div>
        <div class="form-group">
            <button name="submit" type="submit" class="btn btn-outline-success">Register</button>
        </div>
        </form>
    </div>
</div>

@endsection

