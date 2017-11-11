<?php
/**
 * Qualwebs Glossary Block Edit
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */

namespace Qualwebs\Glossary\Block\Adminhtml\Grid;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize glossary edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'glossary_id';
        $this->_blockGroup = 'Qualwebs_Glossary';
        $this->_controller = 'adminhtml_grid';

        parent::_construct();

        if ($this->_isAllowedAction('Qualwebs_Glossary::grid_save')) {
            $this->buttonList->update('save', 'label', __('Save Glossary'));
            $this->buttonList->add(
                'saveandcontinue',
                [
                    'label' => __('Save and Continue Edit'),
                    'class' => 'save',
                    'data_attribute' => [
                        'mage-init' => [
                            'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                        ],
                    ]
                ],
                -100
            );
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('Qualwebs_Glossary::grid_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete Glossary'));
        } else {
            $this->buttonList->remove('delete');
        }
    }

    /**
     * Retrieve text for header element depending on loaded glossary
     *
     * @return \Magento\Framework\Phrase
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('grid')->getId()) {
            return __("Edit grid by '%1'", $this->escapeHtml($this->_coreRegistry->registry('grid')->getName()));
        } else {
            return __('New Glossary');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Getter of url for "Save and Continue" button
     * tab_id will be replaced by desired by JS later
     *
     * @return string
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('glossary/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}