<?php

namespace App\StateMachines\Invoice;

use App\StateMachines\BaseInvoiceState;

class UncollectableInvoiceState extends BaseInvoiceState
{
    public function pay() {
        $this->invoice->update(['state' => 'paid']);
        $this->invoice->send();
    }
    public function void() {
        $this->invoice->update(['state' => 'void']);
    }
}
