<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\AuthorizeTransaction as SprykerEcoAuthorizeTransaction;

class AuthorizeTransaction extends SprykerEcoAuthorizeTransaction
{
    use AbstractTransactionOverrideTrait;
}
