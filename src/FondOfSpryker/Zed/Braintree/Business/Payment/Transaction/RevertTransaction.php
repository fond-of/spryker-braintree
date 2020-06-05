<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\RevertTransaction as SprykerEcoRevertTransaction;

class RevertTransaction extends SprykerEcoRevertTransaction
{
    use AbstractTransactionOverrideTrait;
}
