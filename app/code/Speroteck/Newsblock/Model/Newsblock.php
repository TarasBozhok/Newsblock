<?php

namespace Speroteck\Newsblock\Model;

use Magento\Framework\DataObject\IdentityInterface;
use Speroteck\Newsblock\Api\Data\NewsblockInterface;

class Newsblock extends \Magento\Framework\Model\AbstractModel implements NewsblockInterface, IdentityInterface
{
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'newsblock';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * @var string
     */
    protected $_cacheTag = 'newsblock';

    /**
     *
     * @var string
     */
    protected $_eventPrefix = 'newsblock';

    protected function _construct()
    {
        $this->_init('Speroteck\Newsblock\Model\ResourceModel\Newsblock');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::NEWSBLOCK_ID);
    }

    /**
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @return string|null
     */
    public function getShortDescription()
    {
        return $this->getData(self::SHORT_DESCRIPTION);
    }

    /**
     * @return string|null
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @return bool|null
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled-my'), self::STATUS_DISABLED => __('Disabled-my')];
    }

    /**
     * @param int $id
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setId($id)
    {
        return $this->setData(self::NEWSBLOCK_ID, $id);
    }

    /**
     * @param string $creationTime
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * @param string $updateTime
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * @param string $name
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @param string $shortDescription
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setShortDescription($shortDescription)
    {
        return $this->setData(self::SHORT_DESCRIPTION, $shortDescription);
    }

    /**
     * @param string $content
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * @param int|bool $isActive
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }
}