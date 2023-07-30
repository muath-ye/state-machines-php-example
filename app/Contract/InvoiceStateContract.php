<?php

namespace App\Contract;

interface InvoiceStateContract
{
    public function finalize();
    public function pay();
    public function void();
    public function cancel();
}
