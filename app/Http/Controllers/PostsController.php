<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$posts = DB::statement('SELECT * FROM posts');
        //dd($posts);
        //$posts=DB::select('SELECT * FROM posts');
        // $posts=DB::select('SELECT * FROM posts where id=1');
        // dd($posts);
        // $posts = DB::insert('INSERT INTO posts (title, excerpt, body, image_path, is_published,  min_to_read) values (?, ?, ?, ?, ?, ?)', ['Test', 'test', 'test', 'test', true, 1]);
        // dd($posts);
        // $posts = DB::update('UPDATE posts set body = ? where id = ?', ['Body 2', 203]);
        // dd($posts);
// $posts =DB::delete('DELETE from posts where id=?', [203]);
//         dd($posts);
//$posts =DB::table('posts')->find(1);
//$posts =DB::table('posts')->find(1);
//->select('title', 'body')
//->where('id', '>' ,50)
//->where('id', 100)
//->where('is_published', true)
//->whereBetween('min_to_read', [2, 6])
//->wherenotBetween('min_to_read', [2, 6])
//->wherein('min_to_read', [2, 6, 8])
//->wherenull('excerpt')
//->wherenotnull('excerpt')
//->select('min_to_read')
//->orderBy('id', 'desc')
//->skip(30)
//->take(10)
//->inRandomOrder()
//->distinct()
//->first();
//->find(100);
//->value('body');
//->get();
//->count();
//->min('min_to_read');
//->max('min_to_read');
//->sum('min_to_read');
//->avg('min_to_read');
//dd($posts);

        //var_dump($posts);
        //$posts=Post::where('min_to_read','!=','2')->get();
        // dd($posts);
        
    //    post::chunk(25, function($posts)
    //    {
    //     foreach($posts as $post)
    //     {
    //         echo $post->title. '<br>';
    //     }
    //    });
   
        return view('blog.index',[
    'posts' =>post::orderBy('updated_at', 'desc')->paginate(20)
    ]);
    
        
        // ,[
        //     //'posts'=> DB::table('posts')->get()
        // ]
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFormRequest $request)

    {
        $request->validated();
      
   Post::create([
        'title'=>$request->title,
        'excerpt'=>$request->excerpt,
        'body'=>$request->body,
        'image_path'=>$this->storeImage($request),
        'is_published'=>$request->is_published === 'on',
        'min_to_read'=>$request->min_to_read
      
    ]);
        return redirect(route('blog.index'));
   
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
return view('blog.show',[ 
'post'=>post::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        return view('blog.edit',[ 
            'post'=>Post::where('id',$id)->first()
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostFormRequest $request, $id)
    {
        $request->validated();
        Post::where('id', $id)->update(
            $request->is_published == 'on' 
                ? array_replace($request->except('_token', '_method'), ['is_published' => 1])
                : array_replace($request->except('_token', '_method'), ['is_published' => 0])
        );

      return redirect(route('blog.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      Post::destroy($id);
      return redirect(route('blog.index'))->with('message', 'post has been deleted.');
    }
    private function storeImage($request)
    {
$newImageName=uniqid(). '.' .$request->title. '.' .
 $request->image->extension();
return $request->image->move(public_path('images'), $newImageName);
    }
}
