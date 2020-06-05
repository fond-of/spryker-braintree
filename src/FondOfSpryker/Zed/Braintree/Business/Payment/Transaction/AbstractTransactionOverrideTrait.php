<?php

namespace FondOfSpryker\Zed\Braintree\Business\Payment\Transaction;

use FondOfSpryker\Zed\Braintree\Exception\ErrorResponseLogException;
use Spryker\Shared\ErrorHandler\ErrorLogger;

trait AbstractTransactionOverrideTrait
{
    /**
     * @param \Braintree\Result\Successful|\Braintree\Result\Error $response
     *
     * @return \Generated\Shared\Transfer\BraintreeTransactionResponseTransfer
     */
    protected function getErrorResponseTransfer($response)
    {
        $braintreeTransactionResponseTransfer = parent::getErrorResponseTransfer($response);

        $exception = new ErrorResponseLogException(sprintf('Braintree: %s', $response->message));
        ErrorLogger::getInstance()->log($exception);

        return $braintreeTransactionResponseTransfer;
    }
}
