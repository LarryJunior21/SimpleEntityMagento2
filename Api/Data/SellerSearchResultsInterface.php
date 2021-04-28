<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Seller\Api\Data;

interface SellerSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get Seller list.
     * @return \Gama\Seller\Api\Data\SellerInterface[]
     */
    public function getItems();

    /**
     * Set name list.
     * @param \Gama\Seller\Api\Data\SellerInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

