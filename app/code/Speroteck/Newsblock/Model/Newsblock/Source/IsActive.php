<?php
namespace Speroteck\Newsblock\Model\Newsblock\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Speroteck\Newsblock\Model\Newsblock
     */
    protected $newsblock;

    /**
     * Constructor
     *
     * @param \Speroteck\Newsblock\Model\Newsblock $newsblock
     */
    public function __construct(\Speroteck\Newsblock\Model\Newsblock $newsblock)
    {
        $this->newsblock = $newsblock;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->newsblock->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}