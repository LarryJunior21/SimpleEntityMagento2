<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Seller\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface SellerRepositoryInterface
{

    /**
     * Save Seller
     * @param \Gama\Seller\Api\Data\SellerInterface $seller
     * @return \Gama\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Gama\Seller\Api\Data\SellerInterface $seller
    );

    /**
     * Retrieve Seller
     * @param string $sellerId
     * @return \Gama\Seller\Api\Data\SellerInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($sellerId);

    /**
     * Retrieve Seller matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Gama\Seller\Api\Data\SellerSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Seller
     * @param \Gama\Seller\Api\Data\SellerInterface $seller
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Gama\Seller\Api\Data\SellerInterface $seller
    );

    /**
     * Delete Seller by ID
     * @param string $sellerId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($sellerId);
}

