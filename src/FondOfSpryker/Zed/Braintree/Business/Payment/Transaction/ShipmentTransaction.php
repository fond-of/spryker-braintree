<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\ShipmentTransaction as SprykerEcoShipmentTransaction;

class ShipmentTransaction extends SprykerEcoShipmentTransaction
{
    use AbstractTransactionOverrideTrait;
}
