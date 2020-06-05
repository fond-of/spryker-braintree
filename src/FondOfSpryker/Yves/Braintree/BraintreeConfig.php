<?php

namespace FondOfSpryker\Yves\Braintree;

use FondOfSpryker\Shared\Braintree\BraintreeConstants;
use SprykerEco\Shared\Braintree\BraintreeConfig as SprykerEcoBraintreeSharedConfig;
use SprykerEco\Yves\Braintree\BraintreeConfig as SprykerEcoBraintreeConfig;

class BraintreeConfig extends SprykerEcoBraintreeConfig
{
    protected const MAPPING = [
        SprykerEcoBraintreeSharedConfig::PAYMENT_METHOD_PAY_PAL => 'fake-paypal-one-time-nonce',
        SprykerEcoBraintreeSharedConfig::PAYMENT_METHOD_PAY_PAL_EXPRESS => 'fake-paypal-one-time-nonce',
        SprykerEcoBraintreeSharedConfig::PAYMENT_METHOD_CREDIT_CARD => 'fake-valid-nonce',
    ];

    /**
     * @param string $method
     *
     * @return string
     */
    public function getFakePaymentMethodNonceMapping(string $method): string
    {
        return $this->get(BraintreeConstants::FAKE_PAYMENT_METHOD_NONCE_MAPPING, $this->getDefaultMapping($method));
    }

    /**
     * @return bool
     */
    public function getFakePaymentMethodNonceShouldOverride(): bool
    {
        return $this->get(BraintreeConstants::FAKE_PAYMENT_METHOD_NONCE_OVERRIDE, false);
    }

    /**
     * @param string $method
     *
     * @return string
     */
    protected function getDefaultMapping(string $method): string
    {
        if (array_key_exists($method, static::MAPPING)) {
            return static::MAPPING[$method];
        }

        return '';
    }
}
