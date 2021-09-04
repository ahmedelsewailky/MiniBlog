@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>{{ Session::get('error') }}</strong>
    </div>
@endif