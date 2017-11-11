<?php
/** 
 * Qualwebs Glossary Block Glossary Letter Navigation
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs
 *
 */

namespace Qualwebs\Glossary\Block;

use Qualwebs\Glossary\Api\Data\GridInterface;
use Qualwebs\Glossary\Model\ResourceModel\Grid\Collection as GridCollection;

class Navigation extends \Magento\Framework\View\Element\Template
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
        \Magento\Framework\App\ResourceConnection $resourceConnection,
        \Qualwebs\Glossary\Model\ResourceModel\Grid\CollectionFactory $gridCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_gridCollectionFactory = $gridCollectionFactory;
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * @return array
     */
    public function buildNavigation () {
        $connection = $this->resourceConnection->getConnection();
        $sql = "SELECT DISTINCT letter FROM glossary Where status = 1 ORDER BY letter";
        $result = $connection->fetchAll($sql);
        foreach ($result as $letter) {
            $results[] = $letter['letter'];
        }
        return $results;
    }
}