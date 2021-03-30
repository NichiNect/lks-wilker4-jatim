@extends('layouts.frontend')

@section('style')
<style>
    html {
        scroll-behavior: smooth;
    }
    .garis {
        max-width: 60%;
        border: 1px solid #535351;
    }
</style>
@endsection

@section('content')
<div class="row px-4">
    <div class="col-lg-8">
        <img src="{{ asset('/storage/article/picture/' . $article->picture) }}" alt="" style="max-width: 100%;">
        <div class="row text-center my-5" style="max-width: 80%;">
            <div class="col-lg-12">
                <h1>{{ $article->title }}</h1>
                <hr class="garis">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! $article->content !!}
            </div>
        </div>
    </div>
    {{-- news --}}
    <div class="col-lg-4">
        <h4 class="mt-4">News Article</h4>
        @foreach ($articles as $a)
        <div class="card shadow-sm my-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('/storage/article/picture/' . $a->picture) }}" alt="" class="img-thumbnail" style="max-width: 100%">
                    </div>
                    <div class="col-md-8">
                        <h4>
                            <a href="{{ route('frontend.showarticle', $a) }}">{{ Str::limit($a->title, 20) }}</a>
                        </h4>
                        <p>
                            {!! Str::limit($a->content, 25) !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<hr>

<div class="row mx-4 my-5">
    <div class="col-lg-6">
        <h2>Komentar Lainnya</h2>
        <x-flash_message></x-flash_message>
        @forelse ($comments as $comment)
        <div class="card shadow-sm my-3">
            <div class="card-header">{{ $comment->user->name . ', ' . $comment->created_at->diffForHumans() }}</div>
            <div class="card-body">
                {!! $comment->comment !!}
            </div>
        </div>
        @empty
        <div class="alert alert-warning">
            <p>Tidak Ada Komentar</p>
        </div>
        @endforelse
    </div>
</div>

<div class="row mx-4">
    <div class="col-lg-6">
        <h2>Tuliskan Komentar</h2>
        <form action="{{ route('comment.store', $article->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="comment" id="comment" class="form-control" rows="10" placeholder="Tuliskan komentar.."></textarea>
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-secondary">Kirim komentar!</button>
            </div>
        </form>
    </div>
</div>

<footer class="text-center">
    <hr>
    <p>Presented By &copy; Yoni Widhi {{ date('Y', time()) }}</p>
</footer>

@endsection