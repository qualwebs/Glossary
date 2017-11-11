<?php  
/** 
 * Qualwebs Glossary Controller View for Frontend
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */

namespace Qualwebs\Glossary\Controller\Index;

use \Magento\Framework\App\Action\Action;

class View extends Action
{
    /** @var  \Magento\Framework\View\Result\Page */
    protected $resultPageFactory;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(\Magento\Framework\App\Action\Context $context,
                                \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    /**
     * View Glossary, shows a list of recent Glossary.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}