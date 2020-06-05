<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\PreCheckTransaction as SprykerEcoPreCheckTransaction;

class PreCheckTransaction extends SprykerEcoPreCheckTransaction
{
    use AbstractTransactionOverrideTrait;
}
