<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use App\Models\Invoice_attachements;
use App\Models\Invoice_details;
use App\Models\product;
use App\Models\section;
use App\Models\User;
use App\Notifications\AddInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices=invoice::all();
        return view('invoices.invoices')->with('invoices',$invoices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store_p(Request $request)
    {
        $id=$request->invoice_id;
        $paym=invoice::find($id);
        if ($request->Value_Status==1) $paymStatus=$paym->Status="مدفوعة";
        elseif ($request->Value_Status==2) $paymStatus= $paym->Status="غير مدفوعة";
        elseif ($request->Value_Status==3) $paymStatus=$paym->Status="مدفوعة جزئياً";


        $paym->Value_Status=$request->Value_Status;
        $paym->save();

        Invoice_details::create([
            'id_Invoice'=>$id,
            'invoice_number'=>$request->invoice_number,
            'product'=>$request->product_name,
            'Section'=>$request->section_id,
            "Status"=>$paymStatus,
            "Value_Status"=>$request->Value_Status,
            'Payment_Date'=>$request->Payment_Date,
            'note'=>$request->note,
            'user'=>Auth::user()->name

        ]);
        if ($request->hasFile('pic'))
        {
            $image=$request->file('pic');
            $file_name=$image->getClientOriginalName();
            Invoice_attachements::create([
                'invoice_number'=>$request->invoice_number,
                'file_name'=>$file_name,
                "created_by"=>Auth::user()->name,
                "invoice_id"=>$id
            ]);
            $image_name=$request->pic->getClientOriginalName();
            $invoice_no=$request->invoice_number;
            $request->pic->move(public_path('/Attachments/'.$invoice_no),$image_name);
        }else{
            Invoice_attachements::create([
                'invoice_number'=>$request->invoice_number,

                "created_by"=>Auth::user()->name,
                "invoice_id"=>$id
            ]);
        }

        return redirect('/invoices')->with('success','تم التعدييل بنجاح');


    }
    public function add()
    {
        $sections=section::all();
        return view('invoices.add')->with('sections',$sections)->with('products',product::all());
    }
    public function print_invoice($id)
    {
        $invoices=invoice::find($id);
        return view('invoices.print_invoice')->with('invoices',$invoices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);

        invoice::create([
            "invoice_number" => $request->invoice_number,
            "invoice_Date" => $request->invoice_Date,
            "Due_date" => $request->Due_date,
            "section_id" => $request->Section,
            "product" => $request->product,
            "Amount_collection" => $request->Amount_collection,
            "Amount_Commission" => $request->Amount_Commission,
            "Discount" => $request->Discount,
            "Rate_VAT" => $request->Rate_VAT,
            "Value_VAT" => $request->Value_VAT,
            "Status"=>"غير مدفوعة",
            "Value_Status"=>'2',
            "Total" => $request->Total,
            "note" => $request->note
        ]);
        $invoice_id=invoice::latest()->first()->id;
            Invoice_details::create([
                'id_Invoice'=>$invoice_id,
            'invoice_number'=>$request->invoice_number,
              'product'=>$request->product,
                    'Section'=>$request->Section,
                "Status"=>"غير مدفوعة",
                "Value_Status"=>'2',
            'Payment_Date'=>$request->Payment_Date,
            'note'=>$request->note,
            'user'=>Auth::user()->name

        ]);
            if ($request->hasFile('pic'))
            {
                $image=$request->file('pic');
                $file_name=$image->getClientOriginalName();
                Invoice_attachements::create([
                    'invoice_number'=>$request->invoice_number,
                    'file_name'=>$file_name,
                    "created_by"=>Auth::user()->name,
                    "invoice_id"=>$invoice_id
                ]);
                $image_name=$request->pic->getClientOriginalName();
                $invoice_no=$request->invoice_number;
                $request->pic->move(public_path('/Attachments/'.$invoice_no),$image_name);
            }else{
                Invoice_attachements::create([
                    'invoice_number'=>$request->invoice_number,

                    "created_by"=>Auth::user()->name,
                    "invoice_id"=>$invoice_id
                ]);
            }

            $user=User::first();

            Notification::send($user,new AddInvoice($invoice_id));




        return redirect('/invoices')->with('success',"تم اضافة فاتورة جديدة");

      		 }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice=invoice::find($id);
        return view('invoices.editPaymentStatus',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(invoice $invoice)
    {
        //
    }

    public function getproducts($id)
    {
        $products=DB::table("products")->where("section_id",$id)->pluck("product_name","id");
        return json_encode($products);
    }
}
