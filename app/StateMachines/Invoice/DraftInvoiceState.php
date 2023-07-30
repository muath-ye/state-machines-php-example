<?php

namespace App\StateMachines\Invoice;

use App\StateMachines\BaseInvoiceState;

class DraftInvoiceState extends BaseInvoiceState
{
    public function finalize() {
        $this->invoice->update(['state' => 'open']);
        $this->invoice->send();
    }
}
