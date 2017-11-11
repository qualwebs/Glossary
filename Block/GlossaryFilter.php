<?php
/**
 * Qualwebs Glossary Block Glossary Filter
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs
 */
namespace Qualwebs\Glossary\Block;

use Qualwebs\Glossary\Api\Data\GridInterface;
use Qualwebs\Glossary\Model\ResourceModel\Grid\Collection as GridCollection;

class GlossaryFilter extends \Magento\Framework\View\Element\Template
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
	 * @return mixed
	 */
	public function _prepareLayout () {
		return parent::_prepareLayout();
	}

	/**
	 * @return array
	 */
	public function getGlossary () {
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        //get letter param
        $params = array_keys($this->getRequest()->getParams());
        $connection = $this->resourceConnection->getConnection();
		$sql = "SELECT * FROM `glossary` WHERE `letter` = '".$params[0]."' AND `status` = 1 ORDER BY `letter`";
		$result = $connection->fetchAll($sql);
		return $result;
	}

}