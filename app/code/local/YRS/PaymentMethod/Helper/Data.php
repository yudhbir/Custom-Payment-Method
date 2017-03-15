<?php
class YRS_PaymentMethod_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function EnableDisable()
    {
       return Mage::getStoreConfig("payment/paymentmethod/active");  
    }
}