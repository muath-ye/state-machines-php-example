<?php

namespace App\StateMachines;

use App\Contract\InvoiceStateContract;
use App\Models\Invoice;
use Exception;

class BaseInvoiceState implements InvoiceStateContract
{
    public function __construct(public Invoice $invoice) { }
    public function finalize() { throw new Exception(); }
    public function pay() { throw new Exception(); }
    public function void() { throw new Exception(); }
    public function cancel() { throw new Exception(); }
}
