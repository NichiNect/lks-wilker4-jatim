@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Admin Dashboard</h1>

            <div class="my-4">
                <x-flash_message></x-flash_message>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3>Total User</h3>
                    <h4>
                        {{ $users }}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3>Total Articles</h3>
                    <h4>
                        {{ $articles }}
                    </h4>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection