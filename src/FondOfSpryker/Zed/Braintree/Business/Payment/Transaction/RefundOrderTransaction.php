<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\RefundOrderTransaction as SprykerEcoRefundOrderTransaction;

class RefundOrderTransaction extends SprykerEcoRefundOrderTransaction
{
    use AbstractTransactionOverrideTrait;
}
