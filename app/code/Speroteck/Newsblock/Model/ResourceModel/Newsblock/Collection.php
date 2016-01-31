<?php

namespace Speroteck\Newsblock\Model\ResourceModel\Newsblock;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'newsblock_id';

    /**
     * Collection constructor.
     */
    public function _construct()
    {
        $this->_init('Speroteck\Newsblock\Model\Newsblock', 'Speroteck\Newsblock\Model\ResourceModel\Newsblock');
    }
}