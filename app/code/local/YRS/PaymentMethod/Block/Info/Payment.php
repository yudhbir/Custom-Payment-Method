<?php
class YRS_PaymentMethod_Block_Info_Payment extends Mage_Payment_Block_Info
{
    protected function _prepareSpecificInformation($transport = null)
	{
		if (null !== $this->_paymentSpecificInformation) 
		{
		  return $this->_paymentSpecificInformation;
		}
		 
		$data = array();
		if ($this->getInfo()->getCcType()) 
		{
		  $data[Mage::helper('paymentmethod')->__('CC Type')] = $this->getInfo()->getCcType();
		}
		 
		if ($this->getInfo()->getCcExpMonth()) 
		{
		  $data[Mage::helper('paymentmethod')->__('CC Expire Month')] = $this->getInfo()->getCcExpMonth();
		}
	 
		$transport = parent::_prepareSpecificInformation($transport);
		 
		return $transport->setData(array_merge($data, $transport->getData()));
	}
}