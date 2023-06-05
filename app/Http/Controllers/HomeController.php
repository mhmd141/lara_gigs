<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $articles = Article::all();
        //return $articles = Article::where('id','!=','1')->get();
        //return $articles = Article::find(1);
        //return $articles = Article::findorfail(10);
        //return $articles = Article::first(1);
        //return $articles = Article::maginate(10);
        
        
        return view('index',[
            'articles'=>$articles, 
            

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
              
        return view('create',[
          

        ]);
    }
    public function manage()
    {
        $articles = Article::all();
        return view('manage',[
            'articles'=>$articles, 
          

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', 
             Article::unique('articles', 'company')],
            'location' => 'required',
            '' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'descriptwebsiteion' => 'required'
        ]);

        // if($request->hasFile('logo')) {
        // $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        // Article::create($formFields);
      $artical = new Article;
      $artical->title = $request->title;
      $artical->company = $request->company;
      $artical->location = $request->location;
      $artical->email = $request->email;
      $artical->tags = $request->tags;

      
      $artical->save();

      return redirect('/')->with('message', 'Article created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $articles = Article::where('id','=',$id)->first();
       return view('articaledetails',[
        'articles'=>$articles, 
        

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
        $articles = Article::findorfail($id);
        return view('edit',[
         'articles'=>$articles,
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
        $formFields = $request->validate([

            'title' => 'required',
            'company' => 'required',
            'location' => 'required',
            '' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'descriptwebsiteion' => 'required'

        ]);

        // if($request->hasFile('logo')) {
        // $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        // }
        //  Article::create($formFields);
      $artical = Article::findorfail($id);
      $artical->title = $request->title;
      $artical->company = $request->company;
      $artical->location = $request->location;
      $artical->email = $request->email;
      $artical->tags = $request->tags;
      $artical->save();

      return redirect('/')->with('message', 'Article created successfully!');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }
    public function register()
    {
        return view('register');
    }
}
