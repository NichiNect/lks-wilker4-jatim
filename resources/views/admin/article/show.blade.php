@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Create New Article</h1>

            <div class="my-3">
                <x-flash_message></x-flash_message>
                <a href="{{ route('admin.article.show', $article->id) }}" class="btn btn-info">Detail</a>
                <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('admin.article.destroy', $article->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-lg">
                <div class="card-header">Detail Article</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Title</td>
                                    <td>:</td>
                                    <td><b>{{ $article->title }}</b></td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>:</td>
                                    <td>{!! $article->content !!}</td>
                                </tr>
                                <tr>
                                    <td>Content</td>
                                    <td>:</td>
                                    <td>
                                        <img src="{{ asset('/storage/article/picture/' . $article->picture) }}" alt="" class="img-thumbnail" style="max-width: 500px;">    
                                    </td>
                                </tr>
                                <tr>
                                    <td>Author</td>
                                    <td>:</td>
                                    <td>{{ $article->user->name }}</td>
                                </tr>
                                <tr>
                                    <td>Created At</td>
                                    <td>:</td>
                                    <td>{{ $article->created_at->diffForHumans() . ', ' . $article->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection