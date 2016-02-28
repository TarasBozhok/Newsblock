<?php

namespace Speroteck\Newsblock\Block\Widget;

class NewsblockList  extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{

    protected $_newsblocklistBlock;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Speroteck\Newsblock\Block\NewsblockList $newsblocklistBlock
    ) {
        parent::__construct($context, array());
        $this->_newsblocklistBlock = $newsblocklistBlock;
    }

    /**
     *
     */
    public function _toHtml()
    {
        $this->setTemplate('widget/newsblocks.phtml');
        $this->setNewsblocks($this->_newsblocklistBlock->getNews());

        return parent::_toHtml();
    }
}
