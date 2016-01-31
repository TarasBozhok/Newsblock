<?php

namespace Speroteck\Newsblock\Controller\Adminhtml\Block;

use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\App\Action\Context;

class Index extends \Magento\Backend\App\Action
{

    protected $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        return parent::__construct($context);

    }

    /**
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        $page = $this->pageFactory->create();

        $page->setActiveMenu('Speroteck_Newsblock::newsblock');
        $page->addBreadcrumb(__('Newsblock'), __('Newsblock'));
        $page->addBreadcrumb(__('Manage Newsblock'), __('Manage Newsblock'));
        $page->getConfig()->getTitle()->prepend(__('Newsblocks'));

        return $page;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Speroteck_Newsblock::newsblocks');
    }


}