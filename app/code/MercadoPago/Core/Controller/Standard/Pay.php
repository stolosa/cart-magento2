<?php

namespace Mercadopago\Core\Controller\Standard;

class Pay
    extends \Magento\Framework\App\Action\Action
{
    protected $_paymentFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \MercadoPago\Core\Model\Standard\PaymentFactory $paymentFactory
    ) {
        $this->_paymentFactory = $paymentFactory;
        parent::__construct($context);
    }

    public function execute()
    {

        $standard = $this->_paymentFactory->create();
        $array_assign = $standard->postPago();
        $this->resultRedirectFactory->create()->setPath($array_assign['init_point']);
    }
}