<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CatalogInventory\Model;

use Magento\CatalogInventory\Api\Data\StockInterface;
use Magento\CatalogInventory\Api\Data\StockItemInterface;
use Magento\CatalogInventory\Api\Data\StockStatusInterface;

/**
 * Class StockRegistryStorage
 */
class StockRegistryStorage
{
    /**
     * @var array
     */
    protected $stocks = [];

    /**
     * @var array
     */
    private $stockItems = [];

    /**
     * @var array
     */
    private $stockStatuses = [];

    /**
     * @param int $scopeId
     * @return StockInterface
     */
    public function getStock($scopeId)
    {
        return isset($this->stocks[$scopeId]) ? $this->stocks[$scopeId] : null;
    }

    /**
     * @param int $scopeId
     * @param StockInterface $value
     * @return void
     */
    public function setStock($scopeId, StockInterface $value)
    {
        $this->stocks[$scopeId] = $value;
    }

    /**
     * @param int|null $scopeId
     * @return void
     */
    public function removeStock($scopeId = null)
    {
        if (null === $scopeId) {
            $this->stocks = [];
        } else {
            unset($this->stocks[$scopeId]);
        }
    }

    /**
     * @param int $productId
     * @param int $scopeId
     * @return StockItemInterface
     */
    public function getStockItem($productId, $scopeId)
    {
        return isset($this->stockItems[$productId][$scopeId]) ? $this->stockItems[$productId][$scopeId] : null;
    }

    /**
     * @param int $productId
     * @param int $scopeId
     * @param StockItemInterface $value
     * @return void
     */
    public function setStockItem($productId, $scopeId, StockItemInterface $value)
    {
        $this->stockItems[$productId][$scopeId] = $value;
    }

    /**
     * @param int $productId
     * @param int|null $scopeId
     * @return void
     */
    public function removeStockItem($productId, $scopeId = null)
    {
        if (null === $scopeId) {
            unset($this->stockItems[$productId]);
        } else {
            unset($this->stockItems[$productId][$scopeId]);
        }
    }

    /**
     * @param int $productId
     * @param int $scopeId
     * @return StockStatusInterface
     */
    public function getStockStatus($productId, $scopeId)
    {
        return isset($this->stockStatuses[$productId][$scopeId]) ? $this->stockStatuses[$productId][$scopeId] : null;
    }

    /**
     * @param int $productId
     * @param int $scopeId
     * @param StockStatusInterface $value
     * @return void
     */
    public function setStockStatus($productId, $scopeId, StockStatusInterface $value)
    {
        $this->stockStatuses[$productId][$scopeId] = $value;
    }

    /**
     * @param int $productId
     * @param int|null $scopeId
     * @return void
     */
    public function removeStockStatus($productId, $scopeId = null)
    {
        if (null === $scopeId) {
            unset($this->stockStatuses[$productId]);
        } else {
            unset($this->stockStatuses[$productId][$scopeId]);
        }
    }
}
