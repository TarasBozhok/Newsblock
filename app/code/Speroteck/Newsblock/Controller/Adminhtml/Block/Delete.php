<?php
namespace Speroteck\Newsblock\Controller\Adminhtml\Block;

use Magento\Framework\App\ResponseInterface;
use Magento\TestFramework\ErrorLog\Logger;

class Delete extends \Magento\Backend\App\Action
{

    /**
     * Dispatch request
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('newsblock_id');
        $resultFactory = $this->resultRedirectFactory->create();

        if ($id) {
            try {
                $model = $this->_objectManager->create('Speroteck\Newsblock\Model\Newsblock');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The newsblock has been deleted'));
                return $resultFactory->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError(__('An error occurred.') . "\n\r" . $e->getMessage());
                return $resultFactory->setPath('*/*/edit', ['newsblock_id' => $id]);
            }
        }
        $this->messageManager->addError(__('The newsblock can\'t be found'));
        return $resultFactory->setPath('*/*/');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Speroteck_Newsblock::delete');
    }


}