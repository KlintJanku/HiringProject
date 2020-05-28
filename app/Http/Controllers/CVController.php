<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\CV;
use App\User;

class CVController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Give acces only to the correct user
        if(Auth::check() && Auth::user()->accountType == 'candidate'){
        return view('cv.create-cv');
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
            'name' => 'required',
            'email' => 'required',
            'required_skills' => 'required',
            'profile_image' => 'image|nullable|max:1999' // validation : need to be a image|optional|max size:1999kb
        ]);

        // Handle File Upload
        if($request->hasFile('profile_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $cv = new CV;
        $cv->name = $request->input('name');
        $cv->job_title = $request->input('job_title');
        $cv->city = $request->input('city');
        $cv->email = $request->input('email');
        $cv->number = $request->input('number');
        $cv->about_me = $request->input('about_me');
        $cv->required_skills = $request->input('required_skills');
        $cv->work_experience = $request->input('work_experience');
        $cv->education = $request->input('education');
        $cv->profile_image = $fileNameToStore;
        $cv->user_id = auth()->user()->id;
        $cv->save();

        return redirect('/dashboard')->with('success', 'CV Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cv = CV::find($id);
        return view('cv.view-cv')->with('cv', $cv);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cv = CV::find($id);

        // Check for corret user
        if(auth()->user()->id !== $cv->user_id){
            return redirect('/posts')->with('error', 'Unauthorized Page');
        }

        
        return view('cv.edit-cv')->with('cv',$cv);
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
            'name' => 'required',
            'email' => 'required',
            'required_skills' => 'required',
            'profile_image' => 'image|nullable|max:1999' // validation : need to be a image|optional|max size:1999kb
        ]);

        // Handle File Upload
        if($request->hasFile('profile_image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('profile_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('profile_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('profile_image')->storeAs('public/profile_image', $fileNameToStore);
        } 

        $cv = CV::find($id);
        $cv->name = $request->input('name');
        $cv->job_title = $request->input('job_title');
        $cv->city = $request->input('city');
        $cv->email = $request->input('email');
        $cv->number = $request->input('number');
        $cv->about_me = $request->input('about_me');
        $cv->required_skills = $request->input('required_skills');
        $cv->work_experience = $request->input('work_experience');
        $cv->education = $request->input('education');
        if($request->hasFile('profile_image')){
            $cv->profile_image = $fileNameToStore;
        }
        $cv->save();

        return redirect('/dashboard')->with('success', 'CV Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cv = CV::find($id);

        if($cv->profile_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/profile_image/'.$cv->profile_image);
        }

        $cv->delete();
        return redirect('/dashboard')->with('success', 'CV Deleted');
    }
}
