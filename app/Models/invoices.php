<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class invoices extends Model
{
    use HasFactory;
    protected $guarded=[];
    use SoftDeletes;


    public function section()
    {
        return $this->belongsTo(sections::class);
    }

    public function invoiceDetail()
    {
        return $this->hasOne(invoices_details::class,'id_Invoice');
    }

    public function invoiceAtt()
    {
        return $this->hasOne(invoice_attachments::class,'invoice_id');
    }


}
