<?php

namespace FondOfSpryker\Shared\Braintree;

use SprykerEco\Shared\Braintree\BraintreeConstants as SprykerEcoBraintreeConstants;

/**
 * Declares global environment configuration keys. Do not use it for other class constants.
 */
interface BraintreeConstants extends SprykerEcoBraintreeConstants
{
    public const FAKE_PAYMENT_METHOD_NONCE_MAPPING = 'BRAINTREE:FAKE_PAYMENT_METHOD_NONCE_MAPPING';
    public const FAKE_PAYMENT_METHOD_NONCE_OVERRIDE = 'BRAINTREE:FAKE_PAYMENT_METHOD_NONCE_OVERRIDE';
}
