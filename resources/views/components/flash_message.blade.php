@if (session('success'))
<div class="alert alert-success my-2" role="alert">
    {{ session('success') }}
</div>
@elseif (session('error'))
<div class="alert alert-danger my-2" role="alert">
    {{ session('error') }}
</div>
@endif
