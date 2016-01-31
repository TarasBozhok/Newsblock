<?php
namespace Speroteck\Newsblock\Controller\Adminhtml\Block;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;

class Edit extends \Magento\Backend\App\Action
{

    protected $resultPageFactory;
    protected $_coreRegistry;

    public function __construct(Context $context, PageFactory $resultPageFactory, Registry $registry)
    {

        $this->resultPageFactory = $resultPageFactory;
        $this->_coreRegistry = $registry;
        return parent::__construct($context);
    }

    protected function _initAction()
    {
        $page = $this->resultPageFactory->create();
        $page->setActiveMenu('Speroteck_Newsblock::newsblock')
            ->addBreadcrumb(__('Newsblock'), __('Newsblock'))
            ->addBreadcrumb(__('Manage Newsblocks'), __('Manage Newsblocks'));
        return $page;
    }

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('newsblock_id');
        $model = $this->_objectManager->create('Speroteck\Newsblock\Model\Newsblock');

        if (!empty($id)) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('The Newsblock no longer exists.'));
                $resultRedirect = $this->resultRedirectFactory->create();
                /** \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->_objectManager->get('Magento\Backend\Model\Session')->getFormData(true);
        if (!empty($data)) {
            $model->setData($data);
        }

        $this->_coreRegistry->register('newsblock', $model);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Newsblock') : __('New Newsblock'),
            $id ? __('Edit Newsblock') : __('New Newsblock')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Newsblocks'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getName() : __('New Newsblock'));

        return $resultPage;
    }


    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Speroteck_Newsblock::save');
    }
}