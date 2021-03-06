<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Http\Requests\TagStoreRequest;
use App\Http\Requests\TagUpdateRequest;


class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemperPage = 15;
        $tagsList = DB::table('tags')->paginate($itemperPage);
        
        return view('tags.index',['tagsList'=>$tagsList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        Tag::create($request->all());
        return redirect('tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   
    {
        $tag = Tag::findOrFail($id);
        // $tag = DB::table('tags')->where('id',$id)->first();
        return view('tags.show', ['tag', $tag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::where('id',$id)->first();
        return view('tags.edit',['tags' => $tags]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, $id)
    {
        $tags = Tag::findOrFail($id);
        $tags->Update($request->all());
        // dd($tags);
        return redirect('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tag::destroy($id);
        // return redirect('tags')->with(['delete' => {{trans('tags/langTag.delSuccess')}} ]);
         return redirect('tags');
    }
}
