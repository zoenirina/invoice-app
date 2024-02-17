<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show(Request $request, Invoice $invoice){
        return $invoice::join('customers','invoices.customer_id','customers.id')->get(['customers.*']);
   }
}
