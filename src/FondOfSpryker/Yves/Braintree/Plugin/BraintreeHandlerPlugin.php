<?php

namespace FondOfSpryker\Yves\Braintree\Plugin;
use SprykerEco\Yves\Braintree\Plugin\BraintreeHandlerPlugin as SprykerEcoBraintreeHandlerPlugin;

use Spryker\Shared\Kernel\Transfer\AbstractTransfer;
use Spryker\Yves\StepEngine\Dependency\Plugin\Handler\StepHandlerPluginInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \FondOfSpryker\Yves\Braintree\BraintreeFactory getFactory()
 */
class BraintreeHandlerPlugin extends SprykerEcoBraintreeHandlerPlugin implements StepHandlerPluginInterface
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Spryker\Shared\Kernel\Transfer\AbstractTransfer|\Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function addToDataClass(Request $request, AbstractTransfer $quoteTransfer)
    {
        $this->getFactory()->createBraintreeHandler()->addPaymentToQuote($request, $quoteTransfer);
    }
}
