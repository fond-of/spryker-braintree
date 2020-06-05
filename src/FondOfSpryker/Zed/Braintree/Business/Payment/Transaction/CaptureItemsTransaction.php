<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\CaptureItemsTransaction as SprykerEcoCaptureItemsTransaction;

class CaptureItemsTransaction extends SprykerEcoCaptureItemsTransaction
{
    use AbstractTransactionOverrideTrait;
}
