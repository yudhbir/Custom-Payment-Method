<?php
class YRS_PaymentMethod_Block_Form_Payment extends Mage_Payment_Block_Form
{
    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('paymentmethod/form/payment.phtml');
    }
}