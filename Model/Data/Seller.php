<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Seller\Model\Data;

use Gama\Seller\Api\Data\SellerInterface;

class Seller extends \Magento\Framework\Api\AbstractExtensibleObject implements SellerInterface
{

    /**
     * Get seller_id
     * @return string|null
     */
    public function getSellerId()
    {
        return $this->_get(self::SELLER_ID);
    }

    /**
     * Set seller_id
     * @param string $sellerId
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setSellerId($sellerId)
    {
        return $this->setData(self::SELLER_ID, $sellerId);
    }

    /**
     * Get name
     * @return string|null
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * Set name
     * @param string $name
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get password
     * @return string|null
     */
    public function getPassword()
    {
        return $this->_get(self::PASSWORD);
    }

    /**
     * Set password
     * @param string $password
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setPassword($password)
    {
        return $this->setData(self::PASSWORD, $password);
    }

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Gama\Seller\Api\Data\SellerExtensionInterface|null
     */
    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    /**
     * Set an extension attributes object.
     * @param \Gama\Seller\Api\Data\SellerExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Gama\Seller\Api\Data\SellerExtensionInterface $extensionAttributes
    ) {
        return $this->_setExtensionAttributes($extensionAttributes);
    }

    /**
     * Get email
     * @return string|null
     */
    public function getEmail()
    {
        return $this->_get(self::EMAIL);
    }

    /**
     * Set email
     * @param string $email
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

    /**
     * Get adminaccess
     * @return string|null
     */
    public function getAdminaccess()
    {
        return $this->_get(self::ADMINACCESS);
    }

    /**
     * Set adminaccess
     * @param string $adminaccess
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setAdminaccess($adminaccess)
    {
        return $this->setData(self::ADMINACCESS, $adminaccess);
    }

    /**
     * Get address
     * @return string|null
     */
    public function getAddress()
    {
        return $this->_get(self::ADDRESS);
    }

    /**
     * Set address
     * @param string $address
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setAddress($address)
    {
        return $this->setData(self::ADDRESS, $address);
    }

    /**
     * Get productsid
     * @return string|null
     */
    public function getProductsid()
    {
        return $this->_get(self::PRODUCTSID);
    }

    /**
     * Set productsid
     * @param string $productsid
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setProductsid($productsid)
    {
        return $this->setData(self::PRODUCTSID, $productsid);
    }

    /**
     * Get bankaccount
     * @return string|null
     */
    public function getBankaccount()
    {
        return $this->_get(self::BANKACCOUNT);
    }

    /**
     * Set bankaccount
     * @param string $bankaccount
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setBankaccount($bankaccount)
    {
        return $this->setData(self::BANKACCOUNT, $bankaccount);
    }

    /**
     * Get createdat
     * @return string|null
     */
    public function getCreatedat()
    {
        return $this->_get(self::CREATEDAT);
    }

    /**
     * Set createdat
     * @param string $createdat
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setCreatedat($createdat)
    {
        return $this->setData(self::CREATEDAT, $createdat);
    }

    /**
     * Get updatedat
     * @return string|null
     */
    public function getUpdatedat()
    {
        return $this->_get(self::UPDATEDAT);
    }

    /**
     * Set updatedat
     * @param string $updatedat
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setUpdatedat($updatedat)
    {
        return $this->setData(self::UPDATEDAT, $updatedat);
    }
}

