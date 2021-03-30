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
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $a)
                                <tr>
                                    <td>{{ $articles->count() * ($articles->currentPage() - 1) + $loop->iteration }}</td>
                                    <td>{{ $a->title }}</td>
                                    <td>{{ Str::limit($a->content, 150) }}</td>
                                    <td>
                                        <img src="{{ asset('/storage/article/picture/' . $a->picture) }}" alt="" class="img-thumbnail">
                                    </td>
                                    <td><i>{{ $a->user->name }}</i></td>
                                    <td>
                                        @if ($a->status == 1)
                                            <b>Waiting for Accept</b>
                                        @elseif ($a->status == 2)
                                            <b>Accepted</b>
                                        @elseif ($a->status == 0)
                                            <b>Rejected</b>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $a->type }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.article.show', $a->id) }}" class="btn btn-info my-1">Detail</a>
                                        @can('admin')
                                        <a href="{{ route('admin.article.edit', $a->id) }}" class="btn btn-warning my-1">Edit</a>
                                        <form action="{{ route('admin.article.destroy', $a->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger my-1" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                                        </form>
                                        @if ($a->status == 1)
                                        <form action="{{ route('admin.article.acc', $a->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success my-1" onclick="return confirm('Are you sure to ACC this request?')">ACC Request</button>
                                        </form>
                                        @endif
                                        @endcan
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8">
                                        <h4 class="text-center">Data Not Found</h4>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection