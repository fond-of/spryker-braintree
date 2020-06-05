<?php

namespace FondOfSpryker\Zed\Braintree\Business;

use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\AuthorizeTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\CaptureItemsTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\CaptureOrderTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\PaymentTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\PreCheckTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\RefundItemsTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\RefundOrderTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\RevertTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\ShipmentRefundTransaction;
use FondOfSpryker\Zed\Braintree\Business\Payment\Transaction\ShipmentTransaction;
use SprykerEco\Zed\Braintree\Business\BraintreeBusinessFactory as SprykerEcoBraintreeBusinessFactory;
use SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface;

/**
 * @method \SprykerEco\Zed\Braintree\Persistence\BraintreeQueryContainerInterface getQueryContainer()
 * @method \SprykerEco\Zed\Braintree\BraintreeConfig getConfig()
 * @method \SprykerEco\Zed\Braintree\Persistence\BraintreeRepositoryInterface getRepository()
 * @method \SprykerEco\Zed\Braintree\Persistence\BraintreeEntityManagerInterface getEntityManager()
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class BraintreeBusinessFactory extends SprykerEcoBraintreeBusinessFactory
{
    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createAuthorizeTransaction(): TransactionInterface
    {
        return new AuthorizeTransaction($this->getConfig());
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createCaptureOrderTransaction(): TransactionInterface
    {
        return new CaptureOrderTransaction($this->getConfig());
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createCaptureItemsTransaction(): TransactionInterface
    {
        return new CaptureItemsTransaction(
            $this->getConfig(),
            $this->getMoneyFacade(),
            $this->getRepository(),
            $this->getEntityManager(),
            $this->getSalesFacade(),
            $this->createShipmentTransactionHandler()
        );
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createShipmentTransaction(): TransactionInterface
    {
        return new ShipmentTransaction(
            $this->getConfig(),
            $this->getEntityManager()
        );
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createShipmentRefundTransaction(): TransactionInterface
    {
        return new ShipmentRefundTransaction(
            $this->getConfig(),
            $this->getEntityManager()
        );
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createPreCheckTransaction(): TransactionInterface
    {
        return new PreCheckTransaction($this->getConfig(), $this->getMoneyFacade());
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createPaymentTransaction(): TransactionInterface
    {
        return new PaymentTransaction($this->getConfig(), $this->getMoneyFacade());
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createRefundOrderTransaction(): TransactionInterface
    {
        return new RefundOrderTransaction(
            $this->getConfig(),
            $this->getMoneyFacade(),
            $this->createShipmentRefundTransactionHandler(),
            $this->getRepository()
        );
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createRefundItemsTransaction(): TransactionInterface
    {
        return new RefundItemsTransaction(
            $this->getConfig(),
            $this->getMoneyFacade(),
            $this->createShipmentRefundTransactionHandler(),
            $this->getRepository()
        );
    }

    /**
     * @return \SprykerEco\Zed\Braintree\Business\Payment\Transaction\TransactionInterface
     */
    public function createRevertTransaction(): TransactionInterface
    {
        return new RevertTransaction($this->getConfig());
    }
}
