<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use App\Categories;
use Image;
use Illuminate\Support\Facades\Input;
use Auth;
use App\Http\Requests\ControllerArticles;
use App\Http\Requests\ControllerEditArticles;

class ApiArticlesController extends Controller
{
   public function index()
   {
      $article = Article::with('GetNameCategorie')->orderBy("id","DESC")->paginate(5);
      return response()->json($article);
   }

   public function show($id)
   {
     $article    =  Article::find($id);
     return response()->json($article);
   }

    
    public function store(ControllerArticles $request)
    {
    		if($request->hasFile('photo')) 
    		{
    			$logo       =   Input::file('photo');
    			$ext        =   $logo->getClientOriginalExtension();
    			$path       =   public_path().'/uploads/photo';
    			$fullename  =   time().'.'.$ext;
    			$logo       ->  move($path,$fullename);
    			$imagfav    =   Image::make($path.'/'.$fullename);
    			$request    ->  merge(['image'=>$fullename]);
    		}
        $request->merge(['slug'=>$this->make_slug($request->title)]);
   	    $request->merge(['author'=>auth('api')->user()->name]);

    	$article  =  Article::create($request->all());
		return response()->json($article);
    }

    public function destroy($id)
    {
    	$article =  Article::find($id);
    	$article->delete();
    	return response()->json('delete');
    }

   public function AllCategoryArtical()
   {
     $categories = Categories::get();
     return response()->json($categories);
   }


    public function update($id,ControllerEditArticles $request)
    {
        $article =  Article::find($id);

        if($request->hasFile('photo')) 
        {
            $logo       =   Input::file('photo');
            $ext        =   $logo->getClientOriginalExtension();
            $path       =   public_path().'/uploads/photo';
            $fullename  =   time().'.'.$ext;
            $logo       ->  move($path,$fullename);
            $imagfav    =   Image::make($path.'/'.$fullename);
            $request    ->  merge(['image'=>$fullename]);
        }
        $request->merge(['slug'=>$this->make_slug($request->title)]);

        $article->update($request->all());
        return response()->json($article);
    }


}
