<?php

namespace App\Http\Controllers;

use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=section::all();
     return view('sections.sections')->with('data',$data);
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
            'section_name'=>'required|unique:sections',

        ],[
            'section_name.required'=>'اسم القسم مطلوب',
            'section_name.unique'=>'اسم القسم مكرر'
        ]);

//        $validatedData = $request->validate([
//            'section_name' => 'required|unique:sections|max:255',
//        ],[
//
//            'section_name.required' =>'يرجي ادخال اسم القسم',
//            'section_name.unique' =>'اسم القسم مسجل مسبقا',
//
//
//        ]);

        $section=new section();
        $section->section_name=$request->section_name;
        $section->description=$request->description;
        $section->Created_by=Auth::user()->name;
        $section->save();
        return redirect('/sections')->with('success','تم الحفظ بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request)
    {
        $id=$request->id;
        $request->validate([
            'section_name'=>'required|max:255|unique:sections,section_name,'.$id,
//            'section_name'=>'required',
            'description'=>'required',

        ],[
            'section_name.required'=>'اسم القسم مطلوب',
            'section_name.unique'=>'اسم القسم مكرر',
            'description.required'=>'الوصف مطلوب'

        ]);

        $section=section::find($id);
        $section->section_name=$request->section_name;
        $section->description=$request->description;
        $section->save();
        return redirect ('/sections')->with('success','تم التعديل بنجاح');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, section $section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section=section::find($id);
        $section->destroy($id);
        return redirect('/sections')->with('success','تم الحذف بنجاح');
    }
}
