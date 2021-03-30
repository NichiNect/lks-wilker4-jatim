@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>List of All Articles</h1>
            
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Picture</th>
                                    <th>Author</th>
                                    <th>Posted At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $a)
                                <tr>
                                    <tr>{{ $a->title }}</tr>
                                    <tr>{{ Str::limit($a->content, 150) }}</tr>
                                    <tr>
                                        <img src="{{ asset('/storage/article/picture/' . $a->picture) }}" alt="" class="img-thumbnail">
                                    </tr>
                                    <tr>{{ $a->user->name }}</tr>
                                    <tr>{{ $a->created_at->diffForHumans() . ', ' . $a->created_at }}</tr>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6">
                                        <h4 class="text-center">Data Not Found</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection