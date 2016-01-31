<?php

namespace Speroteck\Newsblock\Block;

use \Magento\Framework\View\Element\Template;
use Speroteck\Newsblock\Api\Data\NewsblockInterface;
use \Magento\Framework\Data\Collection;

/**
 * Class Main
 * @package Speroteck\Newsblock\Block
 */
class NewsblockList extends Template implements \Magento\Framework\DataObject\IdentityInterface
{

    protected $_newsblockCollectionFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Speroteck\Newsblock\Model\ResourceModel\Newsblock\CollectionFactory $newsblockCollectionFactory,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Speroteck\Newsblock\Model\ResourceModel\Newsblock\CollectionFactory $newsblockCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_newsblockCollectionFactory = $newsblockCollectionFactory;
    }

    public function getNews()
    {
        if (!$this->hasData('newsblock')) {
            $newsblocks = $this->_newsblockCollectionFactory
                ->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    NewsblockInterface::CREATION_TIME,
                    Collection::SORT_ORDER_DESC
                );
            $this->setData('newsblocks', $newsblocks);
        }
        return $this->getData('newsblocks');
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Speroteck\Newsblock\Model\Newsblock::CACHE_TAG . '_' . 'list'];
    }
}