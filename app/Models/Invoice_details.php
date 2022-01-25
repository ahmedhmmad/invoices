<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_details extends Model
{
    protected $fillable=[
        'id_Invoice',
        'invoice_number',
        'product',
        'Section',
        "Status",
        "Value_Status",
        'Payment_Date',
        'note',
        'user'
        ];

    public function sections()
    {
        return $this->belongsTo(section::class,'Section');
    }
    use HasFactory;
}
