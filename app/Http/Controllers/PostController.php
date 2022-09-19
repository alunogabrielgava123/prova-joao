<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    //Feito
    public function index(Request $request)
    {   
        //busca todos os poste [id , ....]
        $post = Post::all();
        
        return response()->json([
            'posts' => $post,
        ], 200);
    }

    //Feito
    public function store(Request $request)
    {
        $post = new Post;
        $post->usuario = $request->usuario;
        $post->titulo = $request->titulo;
        $post->descricao = $request->descricao;
        $post->save();

        return  response()->json([
            'msg' => 'Criado com sucesso',
            'status' => 201
        ], 201);
    }

    //Feito
    public function show(Request $request)
    {
        $post = Post::find($request->id);

        return  response()->json($post, 200);

    }


    public function edit(Request $request)
    {
        $post = new Post;

        $new_post =  $post->find($request->id);
        
        $new_post->descricao = $request->descricao;
        $new_post->titulo = $request->titulo;
        $new_post->save();

        return  response()->json(['msg' => 'Menssagem atualizado'], 201);

    }

    
    public function destroy(Request $request, $id){
        if(Post::where('id', $id)->exists()) {
            
            $post = Post::find($id);
            $post->delete();
            
            return response()->json([
                "message" => "Post Deletado"
            ], 202);
        }else{
            return response()->json([
                "message" => "Post Não Encontrado"
            ], 404);
        }
    }

}
