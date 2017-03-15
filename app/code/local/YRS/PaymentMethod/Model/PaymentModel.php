<?php
class YRS_PaymentMethod_Model_PaymentModel extends Mage_Payment_Model_Method_Abstract {
	protected $_code  = 'paymentmethod';
	protected $_formBlockType = 'paymentmethod/form_Payment';
	protected $_infoBlockType = 'paymentmethod/info_Payment';
	protected $_canUseCheckout = true;
 
	public function isAvailable($quote = NULL)
	{
		$check_enable=Mage::helper('paymentmethod')->EnableDisable();
		if($check_enable==true)
		{
		   return true;
		}else{
			return false;
		}
	} 

	public function assignData($data)
	{
		$info = $this->getInfoInstance();
		 
		if ($data->getCcType())
		{
		  $info->setCcType($data->getCcType());
		}		 
		if ($data->getCcExpMonth())
		{
		  $info->setCcExpMonth($data->getCcExpMonth());
		}
		if ($data->getCcExpYear())
		{
		  $info->setCcExpYear($data->getCcExpYear());
		}
		if ($data->getCcNumber())
		{
		  $info->setCcNumber($data->getCcNumber());
		}
		if ($data->getCcLast4())
		{
		  $info->setCcLast4($data->getCcLast4());
		}
		if ($data->getCcOwner())
		{
		  $info->setCcOwner($data->getCcOwner());
		}
	 
		return $this;
	}
	 
	public function validate()
	{
		parent::validate();
		$info = $this->getInfoInstance();
		 
		if (!$info->getCcType())
		{
		  $errorCode = 'invalid_data';
		  $errorMsg = $this->_getHelper()->__("Credit Type is a required field.\n");
		}
		 
		if (!$info->getCcExpMonth())
		{
		  $errorCode = 'invalid_data';
		  $errorMsg .= $this->_getHelper()->__('Credit Expire Month is a required field.');
		}
		if (!$info->getCcExpYear())
		{
		  $errorCode = 'invalid_data';
		  $errorMsg .= $this->_getHelper()->__('Credit Expire Year is a required field.');
		}
		if (!$info->getCcNumber())
		{
		  $errorCode = 'invalid_data';
		  $errorMsg .= $this->_getHelper()->__('Credit Number is a required field.');
		}
		if (!$info->getCcLast4())
		{
		  $errorCode = 'invalid_data';
		  $errorMsg .= $this->_getHelper()->__('Credit Last 4 Number is a required field.');
		}
		if (!$info->getCcOwner())
		{
		  $errorCode = 'invalid_data';
		  $errorMsg .= $this->_getHelper()->__('Credit Number is a required field.');
		}
	 
		if ($errorMsg) 
		{
		  Mage::throwException($errorMsg);
		}
	 
		return $this;
	}
	 
	public function getOrderPlaceRedirectUrl()
	{
		return Mage::getUrl('checkout/onepage/success', array('_secure' => false));
	}
}


?>