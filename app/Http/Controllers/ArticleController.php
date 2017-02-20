<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;


class ArticleController extends Controller
{

    public function __construct()
    {
    $this->middleware('isConnected');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = DB::table('articles')->paginate(10);
        return view('articles.index', [
            'articles' => $articles,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'title' => 'required',
            'content' => 'required',
        ],[
            'title.required' => 'Un titre est requis',
            'content.required' => 'champ requis',
        ]);

        Article::create([
           'user_id' => Auth::user()->id,
            'title' => $request->title,
            'content'=> $request->content,
        ]);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $articles = Article::find($id);

        return view('articles.show', [
            'articles' => $articles,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $article = Article::where('id', $id)->with(['user'])->firstOrFail();
        $users   = User::all();

        return view('articles.edit')->with([
            'article' => $article,
            'users'   => $users,
        ]);
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
        $user = User::find($request->user);

        $article = Article::find($id);

        $article->update([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => $user->id
        ]);

        return redirect()->route('article.index')->with('success', 'L\'article a bien été mis à jour');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $article = Article::find($id);
        $article->destroy($article->id);
        return Redirect::back()->with('success', 'Article supprimé');
    }

    public function postComment(Request $request, $id)
    {
        $article = Article::find($id);

        //$comment = new Comment();
        //$comment->comment = $request->get('comment');
        //$comment->article_id = $article->id;
        //$comment->save();

        $comment = Comment::create([
            'comment'    => $request->get('comment'),
            'article_id' => $article->id
        ]);

        if ($request->user()) {
            $comment->user_id = $request->user()->id;
            $comment->save();
        }

        return redirect()->back()->with('success', 'Message posté');

    }

}
