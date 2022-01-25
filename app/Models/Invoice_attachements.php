<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice_attachements extends Model
{
    protected $fillable=[
        'invoice_number',
        'file_name',
        'created_by',
        'invoice_id'

    ];
    use HasFactory;
}
