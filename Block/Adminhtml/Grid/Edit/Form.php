<?php
/**
 * Qualwebs Glossary Add New Row Form Admin Block.
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */
namespace Qualwebs\Glossary\Block\Adminhtml\Grid\Edit;
 
 
/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
 
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('grid_form');
        $this->setTitle(__('Glossary'));
    }
 
    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Credevlabz\Testimonials\Model\Testimonial $model */
        $model = $this->_coreRegistry->registry('grid');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Glossary'), 'class' => 'fieldset-wide']
        );

        if ($model->getGlossaryId()) {
            $fieldset->addField('glossary_id', 'hidden', ['name' => 'glossary_id']);
        }

        $fieldset->addField(
            'title',
            'text',
            ['name' => 'title', 'label' => __('Title'), 'title' => __('Title'), 'required' => true]
        );

        $fieldset->addField(
            'metakeywords',
            'text',
            ['name' => 'metakeywords', 'label' => __('Meta Keywords'), 'title' => __('Meta Keywords'), 'required' => false]
        );

        $fieldset->addField(
            'metadescription',
            'text',
            ['name' => 'metadescription', 'label' => __('Meta Description'), 'title' => __('Meta Description'), 'required' => false]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'status',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
        if (!$model->getId()) {
            $model->setData('status', '1');
        }

        $fieldset->addField(
            'glossary_content',
            'editor',
            [
                'name' => 'glossary_content',
                'label' => __('Glossary Content'),
                'style' => 'height:36em;',
                'required' => true,
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();

    }
}