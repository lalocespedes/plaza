<?php

use Phinx\Migration\AbstractMigration;

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
        $product = $this->table('products');
        $product->addColumn('id_category_default', 'integer', array('limit' =>  11))
        $product->addColumn('sku', 'string', array('limit' =>  30))
        $product->addColumn('description', 'string', array('limit' =>  30))
        $product->addColumn('sku', 'string', array('limit' =>  30))
        $product->addColumn('sku', 'string', array('limit' =>  30))
        ->addColumn('created_at', 'timestamp')
        ->addColumn('updated_at', 'timestamp', array(
                'null'    => true,
                'default' => null
               ))
        ->create();
    }
}
