<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // requête ::all pour récupérer tous les posts coté BDD
        $posts =  Post::all();
        // retour de la view avec compact qui récupère la variable $posts pour être utilisé côté front
        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // affichage du formulaire permettant d'envoyer les nouveaux posts en DDB
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // récupération des champs input grace a l'objet Request
        $title = $request->input('title');
        $content = $request->input('content');
        $author = $request->input('author');
        $follow = $request->input('follow');
        // envoie des données dans un array
        $post = [
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'follow' => $follow,
        ];
        //condition de validation du form qui enregistre les posts en DDB
        $request->validate([
            'title' => 'required|alpha|max:255',
            'content' => 'required|alpha|max:255',
            'author' => 'required|alpha|max:255',
            'follow' => 'required|numeric|integer',
        ]);
        // création des posts en DDB puis redirect sur la page d'affichage de tous les posts
        Post::create($post);
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Affichage du détail d'un post en fonction de son ID
        $posts = Post::find($id);
        return view("blog.show", compact("posts"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edition d'un post en fonction de son ID
        $post = Post::find($id);
        return view("blog.edit", compact('post'));
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
        //condition de validation du form qui enregistre les posts en DDB
        $request->validate([
            'title' => 'required|alpha|max:255',
            'content' => 'required|alpha|max:255',
            'author' => 'required|alpha|max:255',
            'follow' => 'required|numeric|integer',
        ]);
        // utilisation d'un try/catch pour renvoyer un message success ou error au front,
        // cela vérifie aussi si les conditions d'envoi sont respectées
        try {
            
            //récupération du post à édité avec findOrFail si fail message d'erreur
            $post = Post::findOrFail($id);
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->author = $request->input('author');
            $post->follow = $request->input('follow');
            $post->save();


            // redirection avec message success
            return redirect()->back()->with('success', 'Post correctement modifié');
        } catch (\Exception $e) {
            // redirection avec message error
            return redirect()->back()->with('error', "une erreur est survenue");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //récupération du post en fonction de son id pour le supprimer de la BDD
        $post = Post::find($id);
        $post->delete();
        return redirect()->back();
    }
}
