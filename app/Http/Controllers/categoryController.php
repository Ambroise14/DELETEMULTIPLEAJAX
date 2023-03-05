<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index',['data'=>category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new category();
        $data->ref=$request->ref;
        $data->name=$request->name;
        $data->statut=$request->statut==True ? '1' :'0';
        $data->popular=$request->popular==True ? '1' :'0';
        $destination_pat="public/image/category";
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('image')->storeAs($destination_pat,$image_name);
            $data->image=$image_name;
      }
      $data->save();
      return back()->with('success','the category has been saved succull');


;
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(category::where('id',$id)->exists()){
            category::find($id)->delete();
          return back()->with('danger','the category has been deleted succull');

            
        }else{
          return back()->with('danger','Erreur de suppression');

        }
    }
}
