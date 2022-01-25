<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class invoice extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'invoice_number',
        "invoice_number",
        "invoice_Date",
        'Due_date',


        "section_id" ,
        "product" ,
'Amount_collection',
        "Amount_Commission" ,
        "Discount" ,
        "Rate_VAT" ,

        "Value_VAT",
"Status",
"Value_Status",
        "Total"


    ];
    use HasFactory;
    public function sections(){
        return $this->belongsTo(section::class,'section_id');
    }
    public function products(){
        return $this->belongsTo(product::class,'section_id');
    }
}
