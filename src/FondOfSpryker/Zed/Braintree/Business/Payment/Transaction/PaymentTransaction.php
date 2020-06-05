<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\PaymentTransaction as SprykerEcoPaymentTransaction;

class PaymentTransaction extends SprykerEcoPaymentTransaction
{
    use AbstractTransactionOverrideTrait;
}
