<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function articles()
    {
        $title = 'Articles';

        $data = Article::all();

        return view('articles', ['title' => $title, 'data' => $data]);
    }

    public function myArticles()
    {
        $title = 'Action';

        $data = Article::all();

        return view('edit-article', ['title' => $title, 'data' => $data]);
    }

    public function articleToEdit()
    {
        return view('article-edit');
    }

    public function articleById($id)
    {
        $title = 'Edit Article';
        $data = Article::find($id);

        return view('article-edit', ['title' => $title, 'data' => $data]);
    }

    public function createArticle()
    {
        $title = 'Create Article';
        return view('create-article', ['title' => $title]);
    }

    public function editArticle()
    {
        $title = 'Edit Article';
        return view('edit-article', ['title' => $title]);
    }

    public function cetak_pdf()
    {

        $article = Article::all();
        $pdf = PDF::loadview('articles.articles.pdf', ['article' => $article]);
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $image_name
        ]);
        return 'Artikel berhasil disimpan';
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $article = Article::find($id);
        // return view('')
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);

        $article->title = $request->title;
        $article->content = $request->content;

        if ($article->featured_image && file_exists(storage_path('app/public/' . $article->featured_image))) {
            Storage::delete('public/' . $article->featured_image);


            $image_name = $request->file('image')->store('image', 'public');
            $article->featured_image = $image_name;

            $article->save();
            return 'Artikel berhasil diubah';
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
