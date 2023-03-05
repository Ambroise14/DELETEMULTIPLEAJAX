<?php
namespace App\Http\Controllers;
use App\Models\category;
use App\Models\gallery;
use App\Models\product;
use Illuminate\Http\Request;
use PDF;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index',['datap'=>product::all()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create',['data'=>category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new product();
        $destination="public/image/product";
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('image')->storeAs($destination,$image_name);
            $data->image=$image_name;
        }
        $data->statut=$request->statut==True ? '1' :'0';
        $data->popular=$request->popular==True ? '1' :'0';
        $data->ref=$request->ref;
        $data->name=$request->name;
        $data->desp=$request->desp;
        $data->price=$request->price;
        $data->category=$request->category;
        $data->save();
        if($request->hasFile('photos')){
            foreach($request->file('photos') as $key=>$files){
                $image=time().$key.''.$files->getClientOriginalName();
                $files->move('image/product',$image);
                $gallery=new gallery();
                $gallery->product_id=$data->id;
                $gallery->name=$image;
                $gallery->save();
            }
        }
      return back()->with('success','the product has been saved succull');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('product.data-edit',['data'=>product::find($id),'cat'=>category::all()]);
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
        $data=product::find($id);
        $destination="public/image/product";
        if($request->hasFile('image')){
            $image=$request->file('image');
            $image_name=$image->getClientOriginalName();
            $path=$request->file('image')->storeAs($destination,$image_name);
            $data->image=$image_name;
        }
        $data->statut=$request->statut==True ? '1' :'0';
        $data->popular=$request->popular==True ? '1' :'0';
        $data->ref=$request->ref;
        $data->name=$request->name;
        $data->desp=$request->desp;
        $data->price=$request->price;
        $data->category=$request->category;
        $data->update();
        if($request->hasFile('photos')){
            foreach($request->file('photos') as $key=>$files){
                $image=time().$key.''.$files->getClientOriginalName();
                $files->move('image/product',$image);
                $gallery=new gallery();
                $gallery->product_id=$data->id;
                $gallery->name=$image;
                $gallery->save();
            }
        }
      return back()->with('success','the product has been saved succull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(product::where('id',$id)->exists()){
            product::find($id)->delete();
          return back()->with('danger','the category has been deleted succull');

            
        }else{
          return back()->with('danger','Erreur de suppression');

        }
    }
    public function destroyimage($id)
    {
        if(gallery::where('id',$id)->exists()){
            gallery::find($id)->delete();
          return response()->json(['statut'=>200,'message'=>'image has been deleted']);

            
        }else{
            return response()->json(['statut'=>400,'message'=>'problema in deleting']);


        }
    }

    public function deletedmultiplleproduct(Request $request){
        $ids=$request->regina;
        product::whereIn('id',explode(',',$ids))->delete();
        return response()->json(['status'=>200,'message'=>'suppression effecuee avec sccess']);
    }

    public function getpdf(){
        $data=product::all();
        $pdf = PDF::loadView('product.pdf',['ariane'=>$data]);
        $pdf->setPaper('A4');
        return $pdf->download('invoice.pdf');
    }
}
