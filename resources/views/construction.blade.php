<h1>This page is under construction. Try again later.</h1>

<p>If you got invited, please enter given password in the field below</p>

<form method="POST" action="/check-invitation">
    {{ csrf_field() }}
    <input type="password" name="invitation_pass" />
    <button type="submit">Submit</button>
</form>
