<?php
/**
 * Qualwebs Glossary Controller Save
 *
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */

namespace Qualwebs\Glossary\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;

class Save extends \Magento\Backend\App\Action
{

    /**
     * @param Action\Context $context
     */
    public function __construct(Action\Context $context, \Magento\Framework\Stdlib\DateTime\DateTimeFactory $dateFactory)
    {
        parent::__construct($context);
        $this->_dateFactory = $dateFactory;
    }

    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Qualwebs_Glossary::save');
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            $date = $this->_dateFactory->create()->gmtDate();
            /** @var \Qualwebs\Glossary\Model\Grid $model */
            $model = $this->_objectManager->create('Qualwebs\Glossary\Model\Grid');

            $id = $this->getRequest()->getParam('glossary_id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);
            if ($model->getCreatedTime() == null || $model->getUpdateTime() == null) {
                $model->setCreatedTime($date)->setUpdateTime($date);
            } else {
                $model->setUpdateTime($date);
            }
            $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
            $title = utf8_decode($data['title']);
            $startingLetter  = utf8_encode($title[0]);
            $ascii = $objectManager->get('\Qualwebs\Glossary\Helper\Data')->asciiLetter($startingLetter);
            $model->setLetter($ascii);
            $this->_eventManager->dispatch(
                'grid_prepare_save',
                ['grid' => $model, 'request' => $this->getRequest()]
            );
            
            try {
                /*$model->save();*/
                $model->save();
                $this->messageManager->addSuccess(__('You saved this Grid.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['glossary_id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the glossary.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['glossary_id' => $this->getRequest()->getParam('glossary_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}