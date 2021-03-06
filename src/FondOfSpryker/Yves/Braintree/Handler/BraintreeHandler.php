<?php

namespace FondOfSpryker\Yves\Braintree\Handler;

use FondOfSpryker\Yves\Braintree\BraintreeConfig;
use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Currency\Plugin\CurrencyPluginInterface;
use SprykerEco\Yves\Braintree\Handler\BraintreeHandler as SprykerEcoBraintreeHandler;
use Symfony\Component\HttpFoundation\Request;

class BraintreeHandler extends SprykerEcoBraintreeHandler
{
    /**
     * @var \FondOfSpryker\Yves\Braintree\BraintreeConfig $braintreeConfig
     */
    protected $braintreeConfig;

    /**
     * @param \Spryker\Yves\Currency\Plugin\CurrencyPluginInterface $currencyPlugin
     * @param \FondOfSpryker\Yves\Braintree\BraintreeConfig $braintreeConfig
     */
    public function __construct(CurrencyPluginInterface $currencyPlugin, BraintreeConfig $braintreeConfig)
    {
        parent::__construct($currencyPlugin, $braintreeConfig);
        $this->braintreeConfig = $braintreeConfig;
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     * @param string $paymentSelection
     *
     * @return void
     */
    protected function setBraintreePayment(Request $request, QuoteTransfer $quoteTransfer, $paymentSelection)
    {
        $braintreePaymentTransfer = $this->getBraintreePaymentTransfer($quoteTransfer, $paymentSelection);
        $nonce = $request->request->get(self::PAYMENT_METHOD_NONCE);

        if ($this->braintreeConfig->getFakePaymentMethodNonce()) {
            $nonce = $this->braintreeConfig->getFakePaymentMethodNonce();
        }

        if ($this->braintreeConfig->getFakePaymentMethodNonceShouldOverride()) {
            $nonce = $this->braintreeConfig->getFakePaymentMethodNonceMapping($paymentSelection);

            $braintreePaymentTransfer = $quoteTransfer->getPayment()->getBraintree();
            $braintreePaymentTransfer->setNonce($nonce);

            $quoteTransfer->getPayment()->setBraintree(clone $braintreePaymentTransfer);
        }

        if ($nonce === null) {
            return;
        }

        $billingAddress = $quoteTransfer->getBillingAddress();
        $braintreePaymentTransfer
            ->setAccountBrand(static::$paymentMethods[$paymentSelection])
            ->setBillingAddress($billingAddress)
            ->setShippingAddress($quoteTransfer->getShippingAddress())
            ->setEmail($quoteTransfer->getCustomer()->getEmail())
            ->setCurrencyIso3Code($this->getCurrency())
            ->setLanguageIso2Code($billingAddress->getIso2Code())
            ->setClientIp($request->getClientIp())
            ->setNonce($nonce);

        $quoteTransfer->getPayment()->setBraintree(clone $braintreePaymentTransfer);
    }
}
