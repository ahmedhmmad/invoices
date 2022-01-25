<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\Invoice_attachements;
use App\Models\Invoice_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InvoiceDetailsController extends Controller
{
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice_details $invoice_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $invoices=invoice::where('id',$id)->first();
        $details= Invoice_details::where('id_invoice',$id)->get();
        $attachments= Invoice_attachements::where('invoice_id',$id)->get();
       return view('invoices.invoiceDetails',compact('invoices','details','attachments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice_details $invoice_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice_details  $invoice_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice_details $invoice_details)
    {
        //
    }

    public function open_file($no,$fname)
    {
//        dd($no,$fname);

       $contents=Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($no.'/'.$fname);
//        $contents = Storage::get('file.jpg');
//        $contents=Storage::disk('public_uploads')->get($no.'/'.$fname);
        return response()->file($contents);


    } public function save_file($no,$fname)
    {
        $contents=Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($no.'/'.$fname);
        return response()->download($contents);

    } public function delete_file(Request $request)
    {
        $file_name=$request->file_name;
        $invoice_no=$request->invoice_no;


        DB::table('Invoice_attachements')
            ->where('invoice_id', '=', $request->invoice_id)
            ->delete();
//


    Storage::disk('public_uploads')->delete($invoice_no.'/'.$file_name);
        return redirect('/invoiceDetails'.'/'.$request->invoice_id)->with('success','تم الحذف بنجاح');



    }
}
