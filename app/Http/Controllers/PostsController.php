<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Give acces only to the correct user
        if(Auth::check() && Auth::user()->accountType == 'company'){
        return view('posts.create-job-offer');
        }
        return redirect('/posts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'salary' => 'required',
            'requiredSkills' => 'required',
            'companyName' => 'required',
            'city' => 'required',
            'type' => 'required',
            'end_at' => 'required',
        ]);

        // Create post
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->salary = $request->input('salary');
        $post->requiredSkills = $request->input('requiredSkills');
        $post->type = $request->input('type');
        $post->companyName = $request->input('companyName');
        $post->companyDescription = $request->input('companyDescription');
        $post->city = $request->input('city');
        $post->end_at = $request->input('end_at');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/dashboard')->with('success', 'Post Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.viewJobs')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for corret user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }
    

        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'salary' => 'required',
            'requiredSkills' => 'required',
            'companyName' => 'required',
            'city' => 'required',
        ]);

        // Update post
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->salary = $request->input('salary');
        $post->requiredSkills = $request->input('requiredSkills');
        $post->type = $request->input('type');
        $post->companyName = $request->input('companyName');
        $post->city = $request->input('city');
        $post->save();

        return redirect('/dashboard')->with('success', 'Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for corret user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts'->with('error', 'Unauthoiaed Page'));
        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Deleted');
    }
}
