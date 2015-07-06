<?php

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Adapter\MysqlAdapter;

class ProductMigration extends AbstractMigration
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
        $products = $this->table('products');
        $products->addColumn('sku', 'string', array('limit' => 30))
            ->addColumn('primary_category', 'integer', array('default' => 0,'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('name', 'string', array('limit' => 128))
            ->addColumn('slug', 'string', array('limit' => 128))
            ->addColumn('description', 'string', 'integer', array('limit' =>  MysqlAdapter::TEXT_REGULAR))
            ->addColumn('excerpt', 'string', 'integer', array('limit' =>  MysqlAdapter::TEXT_REGULAR))
            ->addColumn('free_shipping', 'integer', array('default' => 0, 'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('shippable', 'integer', array('default' => 1, 'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('taxable', 'integer', array('default' => 1, 'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('fixed_quantity', 'integer', array('default' => 0, 'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('weight', 'string', array('default' => 0, 'limit' => 11))
            ->addColumn('track_stock', 'integer', array('default' => 0, 'limit' =>  MysqlAdapter::INT_TINY))
            ->addColumn('quantity', 'integer', array('limit' => 11))
            ->addColumn('price_1', 'decimal', array('precision' => 10, 'scale' => 2))
            ->addColumn('saleprice_1', 'decimal', array('precision' => 10, 'scale' => 2))
            ->addColumn('price_2', 'decimal', array('precision' => 10, 'scale' => 2))
            ->addColumn('saleprice_2', 'decimal', array('precision' => 10, 'scale' => 2))
            ->addColumn('created_at', 'datetime')
            ->addColumn('updated_at', 'datetime', array('null' => true))
            //->addIndex(array('username', 'email'), array('unique' => true))
            ->create();
    }
}
