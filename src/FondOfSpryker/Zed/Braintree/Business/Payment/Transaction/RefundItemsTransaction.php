<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\RefundItemsTransaction as SprykerEcoRefundItemsTransaction;

class RefundItemsTransaction extends SprykerEcoRefundItemsTransaction
{
    use AbstractTransactionOverrideTrait;
}
