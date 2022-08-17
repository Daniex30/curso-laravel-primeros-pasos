<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PutRequest;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::paginate(2);
        return view('dashboard.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('id','title');//pluck vendria siendo como un 
                                                    //select id, title from categories
                                                    //usualemnte se utiliza cuando quieres obtener
                                                    //una columna de una tabla en este caso
                                                    //el title
        //dd($categories);el dd es para debuggerar
        $post = new Post();
        echo view('dashboard.post.create',compact('categories','post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //dd(request('title','slug'));
        //dd($request);
        /*echo request("title").'<br>';
        echo $request->input('slug').'<br>';
        echo request("content").'<br>';
        echo request("description").'<br>';
        */

        //$validated = $request->validate(StoreRequest::myRules());
        //$validated = Validator::make($request->all(),StoreRequest::myRules());

        //dd($validated->errors());
       // dd($validated->fails());
       // $data = array_merge($request->all(),['image' => '']);

    //    $data = $request->validated();
    //    $data['slug']= Str::slug($data['title']);
    //    dd($data);
       
       Post::create($request->validated());
       //modos de redireccionar
       //return route("post.create");
       //return redirect("/post/create");
       //return redirect()->route("post.create");
       return to_route("post.index")->with('status','Registro creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("dashboard.post.show",compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {      
        $categories = Category::pluck('id','title');
        echo view('dashboard.post.edit',compact('categories','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PutRequest $request, Post $post)
    {
        $data = $request->validated();
        if( isset($data["image"])){
            $data["image"] = $filename = time().".".$data["image"]->extension();

            $request->image->move(public_path("image/otro"), $filename);
        }
        $post->update($data);
        //dd($post);

        return to_route("post.index")->with('status','Registro actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route("post.index")->with('status','Registro eliminado.');

    }
}
