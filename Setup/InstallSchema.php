<?php
 
namespace Qualwebs\Glossary\Setup;
 
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();


        $table = $installer->getConnection()
            ->newTable($installer->getTable('glossary'))
            ->addColumn(
                'glossary_id',
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'glossary_id'
            )
            ->addColumn('title', Table::TYPE_TEXT, 150, ['nullable' => false], 'title')
            ->addColumn('metadescription', Table::TYPE_TEXT, 150, ['nullable' => false], 'metadescription')
            ->addColumn('metakeywords', Table::TYPE_TEXT, 150, ['nullable' => false], 'metakeywords')
            ->addColumn('filename', Table::TYPE_TEXT, 150, ['nullable' => false], 'filename')
            ->addColumn('letter', Table::TYPE_TEXT, 150, ['nullable' => false], 'letter')
            ->addColumn('glossary_content', Table::TYPE_TEXT, '2M', [], 'glossary_content')
            ->addColumn('status',Table::TYPE_SMALLINT,null,['nullable' => false],'status')
            ->addColumn('created_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'created_time')
            ->addColumn('update_time', Table::TYPE_DATETIME, null, ['nullable' => false], 'update_time')
            ->setComment('Glossary');
        $installer->getConnection()->createTable($table);


        $installer->endSetup();
    }
}