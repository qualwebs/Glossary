<?php
/**
 * Qualwebs Glossary Model ResourceModel Grid Collection
 *
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */
namespace Qualwebs\Glossary\Model\ResourceModel\Grid;
 
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'glossary_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Qualwebs\Glossary\Model\Grid', 'Qualwebs\Glossary\Model\ResourceModel\Grid');
    }
}