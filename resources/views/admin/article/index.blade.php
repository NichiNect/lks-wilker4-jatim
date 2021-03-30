@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>List of All Articles</h1>

            <div class="my-4">
                <a href="{{ route('admin.article.create') }}" class="btn btn-outline-primary">Create New Article</a>
                <x-flash_message></x-flash_message>
            </div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $a)
                                <tr>
                                    <td>1</td>
                                    <td>{{ $a->title }}</td>
                                    <td>{{ Str::limit($a->content, 150) }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/article/picture/' . $a->picture) }}" alt="" class="img-thumbnail">
                                    </td>
                                    <td>{{ $a->user->name }}</td>
                                    <td>{{ $a->created_at->diffForHumans() . ', ' . $a->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.article.show', $a->id) }}" class="btn btn-info my-1">Detail</a>
                                        <a href="{{ route('admin.article.edit', $a->id) }}" class="btn btn-warning my-1">Edit</a>
                                        <form action="{{ route('admin.article.destroy', $a->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger my-1" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                                        </form>
                                    </td>
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