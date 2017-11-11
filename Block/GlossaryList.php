<?php
/** 
 * Qualwebs Glossary Block Glossary List
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */

namespace Qualwebs\Glossary\Block;

use Qualwebs\Glossary\Api\Data\GridInterface;
use Qualwebs\Glossary\Model\ResourceModel\Grid\Collection as GridCollection;

class GlossaryList extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * @var \Qualwebs\Glossary\Model\ResourceModel\Grid\CollectionFactory
     */
    protected $_gridCollectionFactory;

    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Qualwebs\Glossary\Model\ResourceModel\Grid\CollectionFactory $gridCollectionFactory,
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Qualwebs\Glossary\Model\ResourceModel\Grid\CollectionFactory $gridCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_gridCollectionFactory = $gridCollectionFactory;
    }

    /**
     * @return \Qualwebs\Glossary\Model\ResourceModel\Grid\Collection
     */
    public function getGlossary()
    {
        if (!$this->hasData('grid')) {
            $glossary = $this->_gridCollectionFactory
                ->create()
                ->addFilter('status', 1)
                ->addOrder(
                    GridInterface::TITLE,
                    GridCollection::SORT_ORDER_ASC
                );
            $this->setData('grid', $glossary);
        }
        return $this->getData('grid');
    }
    
    /**
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        if ($this->getGlossary()) {
            $pager = $this->getLayout()->createBlock(
                'Magento\Theme\Block\Html\Pager',
                'grid.list.pager'
            )->setCollection(
                $this->getGlossary()
            );
            $this->setChild('pager', $pager);
            $this->getGlossary()->load();
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
    
    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\Qualwebs\Glossary\Model\Grid::CACHE_TAG . '_' . 'list'];
    }

}