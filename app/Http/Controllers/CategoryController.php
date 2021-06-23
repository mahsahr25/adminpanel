<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Traits\UploadImage;

class CategoryController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($parentid)
    {
//        dd($categoryid);
            $categories=Category::where('parent_id',$parentid)->get();
//            dd($categories);
            if($parentid>0){
                $parent=Category::findOrFail($parentid);
//                dd($parent->path);
                if($parent->path!=null){
                    $trees=explode(',',$parent->path);
//                dd($trees);
                    foreach ($trees as $tree){
                        $parenttitles[$tree]=Category::findOrFail($tree)->title;
                    }
//                    dd($parenttitles);

                }else{
                    $parenttitles=null;

                }

            }else{
                $parenttitles=null;
                $parent=null;
            }

        return view('categories.allcategories',compact(['categories','parentid','parenttitles','parent']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($categoryid)
    {
//        dd($categoryid);
        if($categoryid>0){
            $parent=Category::findOrFail($categoryid);
//                dd($parent->path);
            if($parent->path!=null){
                $trees=explode(',',$parent->path);
//                dd($trees);
                foreach ($trees as $tree){
                    $parenttitles[$tree]=Category::findOrFail($tree)->title;
                }
            }else{
                $parenttitles=null;

            }

        }else{
            $parenttitles=null;
            $parent=null;
        }
        return view('categories.createcategory',compact(['categoryid','parenttitles','parent']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoryid=$request->categoryid;


        $request->validate([
           'title'=>'required',
           'description'=>'nullable|string|max:100',
           'image'=>'nullable|mimes:jpg,png|max:300',
        ]);
        if(isset($request->image)){
            $imagepath=$this->upload($request->file('image'));
        }else{
            $imagepath=null;
        }

//        === depth ====
        if($categoryid==0){
            $depth=1;
        }else{
            $parent=Category::findOrFail($categoryid);
            $depth=$parent->depth+1;
        }
//        ==== path =====
        if($categoryid==0){
            $path=null;
        }else{
            $parent=Category::findOrFail($categoryid);

            if($parent->path==null){
                $path=$parent->id;
            }else{
                $path=$parent->path.','.$parent->id;
            }


        }
        Category::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$imagepath,
            'parent_id'=>$request->categoryid,
            'depth'=>$depth,
            'path'=>$path
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($categoryid)
    {
        $category=Category::findOrFail($categoryid);
        if($categoryid>0){
            $parent=Category::findOrFail($categoryid);
//                dd($parent->path);
            if($parent->path!=null){
                $trees=explode(',',$parent->path);
//                dd($trees);
                foreach ($trees as $tree){
                    $parenttitles[$tree]=Category::findOrFail($tree)->title;
                }
            }else{
                $parenttitles=null;

            }

        }else{
            $parenttitles=null;
            $parent=null;
        }
//        dd($category);
        return view('categories.editcategory',compact(['category','categoryid','parenttitles','parent']));
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
//        dd($request);
        $categoryid=$request->categoryid;
        $category=Category::findOrFail($categoryid);



        $request->validate([
            'title'=>'required',
            'description'=>'nullable|string|max:100',
            'image'=>'mimes:jpg,png|max:300',
        ]);
        if(isset($request->image)){
            if($category->image!=null){
                unlink(public_path($category->image));

            }

            $imagepath=$this->upload($request->file('image'));
            $category->image=$imagepath;
        }
        $category->update([
            'title'=>$request->title,
            'description'=>$request->description
        ]);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category=Category::findOrFail($id)->delete();
//        dd($category);
    }
    public function deleteimage(){
        $categoryid=$_GET['categoryid'];
//        dd($categoryid);
        $category=Category::findOrFail($categoryid);
        unlink(public_path($category->image));
        $category->image=null;
        $category->save();
        return response(['status'=>'ok']);

    }
}
