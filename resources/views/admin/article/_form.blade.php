@if (isset($article))
{{-- Form Edit --}}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Fill the title.." value="{{ $article->title }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="picture">Picture Thumbnail</label>
        <div class="row">
            <div class="col-md-7">
                <img src="{{ asset('/storage/article/picture/'. $article->picture) }}" alt="" class="img-thumbnail" style="max-width: 500px;">
            </div>
            <div class="col-md-5">
                <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror" placeholder="Fill the picture..">
            </div>
        </div>
        @error('picture')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="15" placeholder="Fill the content..">{!! $article->content !!}</textarea>
        @error('content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Edit Article!</button>
    </div>
@else
{{-- Form Create --}}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Fill the title..">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="picture">Picture Thumbnail</label>
        <input type="file" name="picture" id="picture" class="form-control @error('picture') is-invalid @enderror" placeholder="Fill the picture..">
        @error('picture')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea type="text" name="content" id="content" class="form-control @error('content') is-invalid @enderror" rows="15" placeholder="Fill the content.."></textarea>
        @error('content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group text-right">
        <button type="submit" class="btn btn-primary">Create New Article!</button>
    </div>
@endif