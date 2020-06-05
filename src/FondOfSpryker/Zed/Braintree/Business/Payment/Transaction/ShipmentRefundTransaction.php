<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use SprykerEco\Zed\Braintree\Business\Payment\Transaction\ShipmentRefundTransaction as SprykerEcoShipmentRefundTransaction;

class ShipmentRefundTransaction extends SprykerEcoShipmentRefundTransaction
{
    use AbstractTransactionOverrideTrait;
}
