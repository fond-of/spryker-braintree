<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\CaptureOrderTransaction as SprykerEcoCaptureOrderTransaction;

class CaptureOrderTransaction extends SprykerEcoCaptureOrderTransaction
{
    use AbstractTransactionOverrideTrait;
}
