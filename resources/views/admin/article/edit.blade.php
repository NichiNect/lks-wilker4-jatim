@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Edit Article</h1>

            <div class="my-4">
                <x-flash_message></x-flash_message>
            </div>
        </div>
    </div>

    <div class="row my-4">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header">Form Edit Article</div>
                <div class="card-body">
                    <form action="{{ route('admin.article.update', $article->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('admin.article._form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.16.0/basic/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content')
</script>
@endsection