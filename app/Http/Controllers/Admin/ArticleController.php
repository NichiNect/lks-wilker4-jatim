<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        $articles = Article::latest()->get();
        
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');

        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('admin');

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:5'],
            'picture' => ['required', 'mimes:jpg,png,jpeg,svg']
        ]);

        if($request->hasFile('picture')) {
            $file = $request->file('picture');
            $extension = $file->extension();
            $imgName = date('d-m-Y', time()) . '-' . time() . '.' . $extension;
            $file->storeAs('/article/picture', $imgName, 'public');
        } else {
            $imgName = '';
        }

        $article = Article::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'picture' => $imgName,
        ]);

        session()->flash('success', 'Article was created successfully!');
        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('admin');

        $article = Article::findOrFail($id);
        return view('admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('admin');

        $article = Article::findOrFail($id);
        return view('admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('admin');

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string', 'min:5'],
            'picture' => ['mimes:jpg,png,jpeg,svg']
        ]);

        $oldArticle = Article::findOrFail($id);

        if($request->hasFile('picture')) {
            Storage::disk('public')->delete('/article/picture/' . $oldArticle->picture);
            $file = $request->file('picture');
            $extension = $file->extension();
            $imgName = date('d-m-Y', time()) . '-' . time() . '.' . $extension;
            $file->storeAs('/article/picture', $imgName, 'public');
        } else {
            $imgName = $oldArticle->picture;
        }

        $oldArticle->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'picture' => $imgName,
        ]);

        session()->flash('success', 'Article was edited successfully!');
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('admin');
        
        $article = Article::findOrFail($id);

        Storage::disk('public')->delete('/article/picture/' . $article->picture);

        $article->delete();

        session()->flash('success', 'Article was deleted successfully!');
        return redirect()->route('admin.article.index');
    }
}
