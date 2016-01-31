<?php

namespace Speroteck\Newsblock\Model\ResourceModel;

class Newsblock extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param null $resourcePrefix
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,
        $resourcePrefix = null
    ) {
        parent::__construct($context, $resourcePrefix);
        $this->_date = $date;
    }

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('newsblock_entity', 'newsblock_id');
    }

    /**
     * Process post data before saving
     *
     * @param \Magento\Framework\Model\AbstractModel $object
     * @return $this
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _beforeSave(\Magento\Framework\Model\AbstractModel $object)
    {

        if (!$this->isValidNewsblock($object)) {
            throw new \Magento\Framework\Exception\LocalizedException(
                __('Please fill out newsblock fields.')
            );
        }

        $object->setUpdateTime($this->_date->gmtDate());

        return parent::_beforeSave($object);
    }

    /**
     * @param $newsBlock
     * @return bool
     */
    protected function isValidNewsblock($newsBlock)
    {
        return !empty($newsBlock->getName()) && !empty($newsBlock->getContent());
    }
}