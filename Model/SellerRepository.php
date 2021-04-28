<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Gama\Seller\Model;

use Gama\Seller\Api\Data\SellerInterfaceFactory;
use Gama\Seller\Api\Data\SellerSearchResultsInterfaceFactory;
use Gama\Seller\Api\SellerRepositoryInterface;
use Gama\Seller\Model\ResourceModel\Seller as ResourceSeller;
use Gama\Seller\Model\ResourceModel\Seller\CollectionFactory as SellerCollectionFactory;
use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Reflection\DataObjectProcessor;
use Magento\Store\Model\StoreManagerInterface;

class SellerRepository implements SellerRepositoryInterface
{

    protected $dataSellerFactory;

    protected $resource;

    protected $extensibleDataObjectConverter;
    protected $searchResultsFactory;

    protected $sellerCollectionFactory;

    private $storeManager;

    protected $dataObjectHelper;

    protected $sellerFactory;

    protected $dataObjectProcessor;

    protected $extensionAttributesJoinProcessor;

    private $collectionProcessor;


    /**
     * @param ResourceSeller $resource
     * @param SellerFactory $sellerFactory
     * @param SellerInterfaceFactory $dataSellerFactory
     * @param SellerCollectionFactory $sellerCollectionFactory
     * @param SellerSearchResultsInterfaceFactory $searchResultsFactory
     * @param DataObjectHelper $dataObjectHelper
     * @param DataObjectProcessor $dataObjectProcessor
     * @param StoreManagerInterface $storeManager
     * @param CollectionProcessorInterface $collectionProcessor
     * @param JoinProcessorInterface $extensionAttributesJoinProcessor
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     */
    public function __construct(
        ResourceSeller $resource,
        SellerFactory $sellerFactory,
        SellerInterfaceFactory $dataSellerFactory,
        SellerCollectionFactory $sellerCollectionFactory,
        SellerSearchResultsInterfaceFactory $searchResultsFactory,
        DataObjectHelper $dataObjectHelper,
        DataObjectProcessor $dataObjectProcessor,
        StoreManagerInterface $storeManager,
        CollectionProcessorInterface $collectionProcessor,
        JoinProcessorInterface $extensionAttributesJoinProcessor,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter
    ) {
        $this->resource = $resource;
        $this->sellerFactory = $sellerFactory;
        $this->sellerCollectionFactory = $sellerCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->dataObjectHelper = $dataObjectHelper;
        $this->dataSellerFactory = $dataSellerFactory;
        $this->dataObjectProcessor = $dataObjectProcessor;
        $this->storeManager = $storeManager;
        $this->collectionProcessor = $collectionProcessor;
        $this->extensionAttributesJoinProcessor = $extensionAttributesJoinProcessor;
        $this->extensibleDataObjectConverter = $extensibleDataObjectConverter;
    }

    /**
     * {@inheritdoc}
     */
    public function save(
        \Gama\Seller\Api\Data\SellerInterface $seller
    ) {
        /* if (empty($seller->getStoreId())) {
            $storeId = $this->storeManager->getStore()->getId();
            $seller->setStoreId($storeId);
        } */
        
        $sellerData = $this->extensibleDataObjectConverter->toNestedArray(
            $seller,
            [],
            \Gama\Seller\Api\Data\SellerInterface::class
        );
        
        $sellerModel = $this->sellerFactory->create()->setData($sellerData);
        
        try {
            $this->resource->save($sellerModel);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the seller: %1',
                $exception->getMessage()
            ));
        }
        return $sellerModel->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function get($sellerId)
    {
        $seller = $this->sellerFactory->create();
        $this->resource->load($seller, $sellerId);
        if (!$seller->getId()) {
            throw new NoSuchEntityException(__('Seller with id "%1" does not exist.', $sellerId));
        }
        return $seller->getDataModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->sellerCollectionFactory->create();
        
        $this->extensionAttributesJoinProcessor->process(
            $collection,
            \Gama\Seller\Api\Data\SellerInterface::class
        );
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model->getDataModel();
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(
        \Gama\Seller\Api\Data\SellerInterface $seller
    ) {
        try {
            $sellerModel = $this->sellerFactory->create();
            $this->resource->load($sellerModel, $seller->getSellerId());
            $this->resource->delete($sellerModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the Seller: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($sellerId)
    {
        return $this->delete($this->get($sellerId));
    }
}

