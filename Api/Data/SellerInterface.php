<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Seller\Api\Data;

interface SellerInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{

    const ADMINACCESS = 'adminaccess';
    const BANKACCOUNT = 'bankaccount';
    const PRODUCTSID = 'productsid';
    const CREATEDAT = 'createdat';
    const SELLER_ID = 'seller_id';
    const ADDRESS = 'address';
    const UPDATEDAT = 'updatedat';
    const PASSWORD = 'password';
    const NAME = 'name';
    const EMAIL = 'email';

    /**
     * Get seller_id
     * @return string|null
     */
    public function getSellerId();

    /**
     * Set seller_id
     * @param string $sellerId
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setSellerId($sellerId);

    /**
     * Get name
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     * @param string $name
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setName($name);

    /**
     * Get name
     * @return string|null
     */
    public function getPassword();

    /**
     * Set name
     * @param string $password
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setPassword($password);

    /**
     * Retrieve existing extension attributes object or create a new one.
     * @return \Gama\Seller\Api\Data\SellerExtensionInterface|null
     */
    public function getExtensionAttributes();

    /**
     * Set an extension attributes object.
     * @param \Gama\Seller\Api\Data\SellerExtensionInterface $extensionAttributes
     * @return $this
     */
    public function setExtensionAttributes(
        \Gama\Seller\Api\Data\SellerExtensionInterface $extensionAttributes
    );

    /**
     * Get email
     * @return string|null
     */
    public function getEmail();

    /**
     * Set email
     * @param string $email
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setEmail($email);

    /**
     * Get adminaccess
     * @return string|null
     */
    public function getAdminaccess();

    /**
     * Set adminaccess
     * @param string $adminaccess
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setAdminaccess($adminaccess);

    /**
     * Get address
     * @return string|null
     */
    public function getAddress();

    /**
     * Set address
     * @param string $address
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setAddress($address);

    /**
     * Get productsid
     * @return string|null
     */
    public function getProductsid();

    /**
     * Set productsid
     * @param string $productsid
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setProductsid($productsid);

    /**
     * Get bankaccount
     * @return string|null
     */
    public function getBankaccount();

    /**
     * Set bankaccount
     * @param string $bankaccount
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setBankaccount($bankaccount);

    /**
     * Get createdat
     * @return string|null
     */
    public function getCreatedat();

    /**
     * Set createdat
     * @param string $createdat
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setCreatedat($createdat);

    /**
     * Get updatedat
     * @return string|null
     */
    public function getUpdatedat();

    /**
     * Set updatedat
     * @param string $updatedat
     * @return \Gama\Seller\Api\Data\SellerInterface
     */
    public function setUpdatedat($updatedat);
}

