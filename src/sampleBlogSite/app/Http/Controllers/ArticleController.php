<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Profile;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select([
            'a.id',
            'a.article_id',
            'a.title',
            'i.file_name',
            'a.content',
            'a.created_at',
            'a.updated_at',
            ])
            ->from('articles as a')
            ->leftJoin('images as i', function($join) {
                $join->on('i.id', '=', 'a.images_id');
            })
            ->get();
        $profile = Profile::select([
            'p.id',
            'p.name',
            'p.description',
            'i.file_name'
            ])
            ->from('profiles as p')
            ->leftJoin('images as i', function($join) {
                $join->on('i.id', '=', 'p.images_id');
            })
            ->get();
        return view('index', compact('articles','profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Images::get();
        return view('create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // フォームに入力された内容を変数に取得
        $form = $request->only('title', 'content');
        $form["article_id"] = Article::generateUniqueId();
        $form["images_id"] = $request->only('image')["image"];
        var_dump($form);
        // フォームに入力された内容をデータベースへ登録
        $article = new Article();
        $article->fill($form)->save();

        // 記事一覧画面を表示
        return redirect()->route('index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $articles = Article::select([
            'a.article_id',
            'a.title',
            'i.file_name',
            'a.content',
            'a.created_at',
            'a.updated_at',
            ])
            ->from('articles as a')
            ->leftJoin('images as i', function($join) {
                $join->on('i.id', '=', 'a.images_id');
            })
            ->where('a.id', '=', $article->id)
            ->get();
            $profile = Profile::select([
                'p.id',
                'p.name',
                'p.description',
                'i.file_name'
                ])
                ->from('profiles as p')
                ->leftJoin('images as i', function($join) {
                    $join->on('i.id', '=', 'p.images_id');
                })
                ->get();
        return view('show', compact('articles','profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $articles = Article::select([
            'a.id',
            'a.article_id',
            'a.title',
            'i.file_name',
            'a.content',
            'a.created_at',
            'a.updated_at',
            ])
            ->from('articles as a')
            ->leftJoin('images as i', function($join) {
                $join->on('i.id', '=', 'a.images_id');
            })
            ->where('a.id', '=', $article->id)
            ->get();
        $items = Images::get();
        return view('edit', compact('articles','items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $input_article = Article::find($article->id);
        // フォームに入力された内容を変数に取得
        $input_article->title=$request->input('title');
        $input_article->content=$request->input('content');
        //$input_article->images_id=$request->input($request->only('image')["image"]);
        $input_article->save();

        // 記事一覧画面を表示
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
