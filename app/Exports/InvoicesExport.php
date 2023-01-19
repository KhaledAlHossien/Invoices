<?php

namespace App\Exports;

use App\Models\invoices;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return invoices::all(); // All dataBase
       // return invoices::select('id','invoice_number','invoice_Date','product')->get(); // specific fields

    }
}
