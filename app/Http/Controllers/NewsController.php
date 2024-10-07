<?php

namespace App\Http\Controllers;

use App\Models\Yangilik;
use Illuminate\Http\Request;
class NewsController extends Controller
{
    public function index()
    {
        $news = Yangilik::all();
        return view('posts.index', compact('news'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request){
        Yangilik::create([
            'title' => $request->title,
            'content' => $request->input('content')
        ]);

        return redirect()->route('news.index');
    }

    public function show($id){
        $news = Yangilik::find($id);
        return view('posts.show', compact('news'));
    }

    public function edit($id){
        $news = Yangilik::find($id);
        return view('posts.update', compact('news'));
    }

    public function update(Request $request, $id){
        $news = Yangilik::find($id);
        $news->title = $request->title;
        $news->content = $request->input('content');
        $news->save();
        return redirect()->route('news.index');
    }

    public function destroy($id){
        $news = Yangilik::find($id);
        $news->delete();
        return redirect()->route('news.index');
    }
}
