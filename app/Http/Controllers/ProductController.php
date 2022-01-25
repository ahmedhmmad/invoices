<?php

namespace App\Http\Controllers;
use App\Models\section;
use App\Models\product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data=DB::table('products')->select('products.id','products.product_name as ProName','products.description','sections.id','section.section_name as SecName')->join('sections','section.id','=','products.section_id');
//        $data= DB::table('products')->select('products.id','products.description','products.product_name as ProdName','sections.id','sections.section_name as SecName')
//            ->join ('products','products.section_id','=','sections.id')->paginate('4');
$sections=section::all();
$products=product::all();
      return view('products.products')->with('sections',$sections)->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name'=>'required',

            'section_id'=>'required'


            ],[
            'product_name.required'=>'اكتب اسم المنتج',
            'section_id.required'=>'اختار القسم'
        ]);
       $product=new product();
       $product->product_name=$request->product_name;
       $product->section_id=$request->section_id;
       $product->description=$request->description;
       $product->save();
       return redirect('/products')->with('success','تم الحفظ بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'product_name'=>'required'
        ],[
            'product_name.required'=>'اكتب اسم المنتج'
        ]);
        $id=$request->id;
        $product=product::find($id);
        $product->product_name=$request->product_name;
        $product->description=$request->product_description;
        $product->save();
        return redirect('/products')->with('success','تم التعديل بنجاح');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=product::find($id);
        $product->destroy($id);
        return redirect('/products')->with('success','تم الحذف بنجاح');
    }
}
