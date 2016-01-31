<?php

namespace Speroteck\Newsblock\Api\Data;

interface NewsblockInterface
{

    const NEWSBLOCK_ID = 'newsblock_id';
    const CREATION_TIME = 'created_at';
    const UPDATE_TIME = 'updated_at';
    const NAME = 'name';
    const SHORT_DESCRIPTION = 'short_description';
    const CONTENT = 'content';
    const IS_ACTIVE = 'is_active';

    /**
     * @return int|null
     */
    public function getId();

    /**
     * @return string|null
     */
    public function getCreationTime();

    /**
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * @return string|null
     */
    public function getName();

    /**
     * @return string|null
     */
    public function getShortDescription();

    /**
     * @return string|null
     */
    public function getContent();

    /**
     * @return bool|null
     */
    public function getIsActive();

    /**
     * @param int $id
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setId($id);

    /**
     * @param string $creationTime
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setCreationTime($creationTime);

    /**
     * @param string $updateTime
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * @param string $name
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setName($name);

    /**
     * @param string $shortDescription
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setShortDescription($shortDescription);

    /**
     * @param string $content
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setContent($content);

    /**
     * @param int|bool $isActive
     * @return \Speroteck\Newsblock\Api\Data\NewsblockInterface
     */
    public function setIsActive($isActive);

}