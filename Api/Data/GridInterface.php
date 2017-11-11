<?php
/**
 * Qualwebs Glossary Grid Interface.
 * @category    Qualwebs
 * @package     Qualwebs_Glossary
 * @author      Qualwebs Solutions
 *
 */
namespace Qualwebs\Glossary\Api\Data;
 
interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const GLOSSARY_ID = 'glossary_id';
    const TITLE = 'title';
    const METADESCRIPTION = 'metadescription';
    const METAKEYWORDS = 'metakeywords';
    const FILENAME = 'filename';
    const LETTER = 'letter';
    const GLOSSARYCONTENT = 'glossary_content';
    const STATUS = 'status';
    const CREATED_TIME = 'created_time';
    const UPDATE_TIME = 'update_time';
    
    /**
     * Get GlossaryId.
     *
     * @return int
     */
    public function getGlossaryId();
 
    /**
     * Set GlossaryId.
     */
    public function setGlossaryId($glossaryId);
 
    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getTitle();
 
    /**
     * Set Title.
     */
    public function setTitle($title);
 
    /**
     * Get getMetaDescription.
     *
     * @return varchar
     */
    public function getMetaDescription();
 
    /**
     * Set MetaDescription.
     */
    public function setMetaDescription($MetaDescription);
 
    /**
     * Get getMetaKeywords.
     *
     * @return varchar
     */
    public function getMetaKeywords();

    /**
     * Set MetaKeywords.
     */
    public function setMetaKeywords($MetaKeywords);

    /**
     * Get getFileName.
     *
     * @return varchar
     */
    public function getFileName();

    /**
     * Set FileName.
     */
    public function setFileName($FileName);

    /**
     * Get getletter.
     *
     * @return varchar
     */
    public function getLetter();

    /**
     * Set letter.
     */
    public function setLetter($Letter);

    /**
     * Get getglossaryContent.
     *
     * @return varchar
     */
    public function getGlossaryContent();

    /**
     * Set glossaryContent.
     */
    public function setGlossaryContent($GlossaryContent);

    /**
     * Get getStatus.
     *
     * @return varchar
     */
    public function getStatus();

    /**
     * Set status.
     */
    public function setStatus($Status);

     /**
     * Get CreatedTime.
     *
     * @return varchar
     */
    public function getCreatedTime();
 
    /**
     * Set CreatedTime.
     */
    public function setCreatedTime($createdTime);
 
    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();
 
    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime);
 
}