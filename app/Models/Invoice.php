<?php

namespace App\Models;

use App\Contract\InvoiceStateContract;
use App\StateMachines\Invoice\DraftInvoiceState;
use App\StateMachines\Invoice\OpenInvoiceState;
use App\StateMachines\Invoice\PaidInvoiceState;
use App\StateMachines\Invoice\UncollectableInvoiceState;
use App\StateMachines\Invoice\VoidInvoiceState;

class Invoice
{
    public array $state = [
        'state' => 'draft',
    ];

    public function update($state) {
        return $state;
    }

    public function send(): string
    {
        return 'The invoice has been sent with [' . $this->state['state'] . '] state';
    }

    public function state($state)// : InvoiceStateContract
    {
        return match ($state) {
            'draft' => new DraftInvoiceState($this),
            'open' => new OpenInvoiceState($this),
            'paid' => new PaidInvoiceState($this),
            'void' => new VoidInvoiceState($this),
            'uncollectable' => new UncollectableInvoiceState($this),
            default => throw new \InvalidArgumentException('Invalid Argument'),
        };
    }
}
