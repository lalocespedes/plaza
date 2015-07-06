<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class CategoriesMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     */
    public function change()
    {
        $categories = $this->table('categories');
        $categories->addColumn('parent_id', 'integer', array('limit' => 9))
            ->addColumn('name', 'string', array('limit' => 64))
            ->addColumn('slug', 'string', array('limit' => 64))
            ->addColumn('description', 'string', 'integer', array('limit' =>  MysqlAdapter::TEXT_REGULAR))
            ->addColumn('excerpt', 'string', 'integer', array('limit' =>  MysqlAdapter::TEXT_REGULAR))
            ->addColumn('sequence', 'integer', array('default' => 0, 'limit' =>  5))
            ->addColumn('image', 'string', array('null' => true, 'limit' => 255))
            ->addColumn('seo_title', 'string', 'integer', array('limit' =>  MysqlAdapter::TEXT_REGULAR))
            ->addColumn('meta', 'string', 'integer', array('limit' =>  MysqlAdapter::TEXT_REGULAR))
            ->addColumn('enable', 'integer', array('default' => 0, 'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime', array('null' => true))
            ->create();
    }
}
