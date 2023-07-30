<?php

namespace App\StateMachines\Invoice;

use App\StateMachines\BaseInvoiceState;

class OpenInvoiceState extends BaseInvoiceState
{
    public function pay() {
        $this->invoice->update(['state' => 'paid']);
        $this->invoice->send();
    }
    public function void() {
        $this->invoice->update(['state' => 'void']);
    }
    public function cancel() {
        $this->invoice->update(['state' => 'uncollectable']);
    }
}
