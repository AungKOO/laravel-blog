<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{


    public function index()
    {

        $data = Article::latest()->paginate(5);
        return view('articles.index', ['articles' => $data]);
    }

    public function detail($id)
    {
        $data = Article::find($id);
        return view('articles.detail', ['article' => $data]);
    }

    public function add()
    {
        $data = [
            ["id" => 1, "name" => "News"],
            ["id" => 2, "name" => "Tech"],
        ];
        return view("articles.add", ["categories" => $data]);
    }

    public function create()
    {
        $validator = Validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/articles/add')
                ->withErrors($validator)
                ->withInput();
        }

        $article = new Article();
        $article->title = request('title');
        $article->body = request('body');
        $article->category_id = request('category_id');
        $article->save();
        return redirect('/articles')->with('success', 'Article has been added successfully');
    }


    public function edit($id)
    {
        $data = Article::find($id);
        $categories = [
            ["id" => 1, "name" => "News"],
            ["id" => 2, "name" => "Tech"],
        ];
        return view('articles.edit', ['article' => $data, 'categories' => $categories]);
    }
    public function update($id)
    {
        $data = Article::find($id);
        $data->title = request('title');
        $data->body = request('body');
        $data->category_id = request('category_id');
        $data->save();
        return redirect('/articles')->with('info', 'Article has been updated');
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('info', 'Article has been deleted');
    }
}
