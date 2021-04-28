<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Seller\Model;

use Gama\Seller\Api\Data\SellerInterface;
use Gama\Seller\Api\Data\SellerInterfaceFactory;
use Magento\Framework\Api\DataObjectHelper;

class Seller extends \Magento\Framework\Model\AbstractModel
{

    protected $sellerDataFactory;

    protected $dataObjectHelper;

    protected $_eventPrefix = 'gama_seller_seller';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param SellerInterfaceFactory $sellerDataFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param \Gama\Seller\Model\ResourceModel\Seller $resource
     * @param \Gama\Seller\Model\ResourceModel\Seller\Collection $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        SellerInterfaceFactory $sellerDataFactory,
        DataObjectHelper $dataObjectHelper,
        \Gama\Seller\Model\ResourceModel\Seller $resource,
        \Gama\Seller\Model\ResourceModel\Seller\Collection $resourceCollection,
        array $data = []
    ) {
        $this->sellerDataFactory = $sellerDataFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Retrieve seller model with seller data
     * @return SellerInterface
     */
    public function getDataModel()
    {
        $sellerData = $this->getData();
        
        $sellerDataObject = $this->sellerDataFactory->create();
        $this->dataObjectHelper->populateWithArray(
            $sellerDataObject,
            $sellerData,
            SellerInterface::class
        );
        
        return $sellerDataObject;
    }
}

