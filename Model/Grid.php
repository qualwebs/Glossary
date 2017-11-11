<?php
/**
 * Qualwebs Glossary Model Grid
 *
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */
namespace Qualwebs\Glossary\Model;
 
use Qualwebs\Glossary\Api\Data\GridInterface;
 
class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'glossary';
 
    /**
     * @var string
     */
    protected $_cacheTag = 'glossary';
 
    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'glossary';
 
    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Qualwebs\Glossary\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getGlossaryId()
    {
        return $this->getData(self::GLOSSARY_ID);
    }
 
    /**
     * Set EntityId.
     */
    public function setGlossaryId($glossaryId)
    {
        return $this->setData(self::GLOSSARY_ID, $glossaryId);
    }
 
    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
 
    /**
     * Set Title.
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
 
    /**
     * Get getMetaDescription.
     *
     * @return varchar
     */
    public function getMetaDescription()
    {
        return $this->getData(self::METADESCRIPTION);
    }
 
    /**
     * Set MetaDescription.
     */
    public function setMetaDescription($MetaDescription)
    {
        return $this->setData(self::METADESCRIPTION, $MetaDescription);
    }

    /**
     * Get getMetaKeywords.
     *
     * @return varchar
     */
    public function getMetaKeywords()
    {
        return $this->getData(self::METAKEYWORDS);
    }
 
    /**
     * Set MetaKeywords.
     */
    public function setMetaKeywords($MetaKeywords)
    {
        return $this->setData(self::METAKEYWORDS, $MetaKeywords);
    }

    /**
     * Get getFileName.
     *
     * @return varchar
     */
    public function getFileName()
    {
        return $this->getData(self::FILENAME);
    }
 
    /**
     * Set FileName.
     */
    public function setFileName($FileName)
    {
        return $this->setData(self::FILENAME, $FileName);
    }

    /**
     * Get getletter.
     *
     * @return varchar
     */
    public function getLetter()
    {
        return $this->getData(self::LETTER);
    }
 
    /**
     * Set letter.
     */
    public function setLetter($Letter)
    {
        return $this->setData(self::LETTER, $Letter);
    }

    /**
     * Get getglossaryContent.
     *
     * @return varchar
     */
    public function getGlossaryContent()
    {
        return $this->getData(self::GLOSSARYCONTENT);
    }
 
    /**
     * Set glossaryContent.
     */
    public function setGlossaryContent($GlossaryContent)
    {
        return $this->setData(self::GLOSSARYCONTENT, $GlossaryContent);
    }

    /**
     * Get getStatus.
     *
     * @return varchar
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }
 
    /**
     * Set status.
     */
    public function setStatus($Status)
    {
        return $this->setData(self::STATUS, $Status);
    }
 
    /**
     * Get CreatedTime.
     *
     * @return varchar
     */
    public function getCreatedTime()
    {
        return $this->getData(self::CREATED_TIME);
    }
 
    /**
     * Set CreatedTime.
     */
    public function setCreatedTime($createdTime)
    {
        return $this->setData(self::CREATED_TIME, $createdTime);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }
 
    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }
 
}