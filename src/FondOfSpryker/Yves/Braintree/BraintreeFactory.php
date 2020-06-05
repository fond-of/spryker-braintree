<?php

namespace FondOfSpryker\Yves\Braintree;

use FondOfSpryker\Yves\Braintree\Handler\BraintreeHandler;
use SprykerEco\Yves\Braintree\BraintreeFactory as SprykerEcoBraintreeFactory;
use SprykerEco\Yves\Braintree\Handler\BraintreeHandlerInterface;

/**
 * @method \FondOfSpryker\Yves\Braintree\BraintreeConfig getConfig()
 */
class BraintreeFactory extends SprykerEcoBraintreeFactory
{
    /**
     * @return \SprykerEco\Yves\Braintree\Handler\BraintreeHandlerInterface
     */
    public function createBraintreeHandler(): BraintreeHandlerInterface
    {
        return new BraintreeHandler($this->getCurrencyPlugin(), $this->getConfig());
    }
}
