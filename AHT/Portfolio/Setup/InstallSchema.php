<?php
namespace AHT\Portfolio\Setup;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context){
        $setup->startSetup();
        $conn=$setup->getConnection();
        $tableCategory=$setup->getTable('portfolio_category');
        $tablePortfolio=$setup->getTable('portfolio');
        $tableConfig=$setup->getTable('portfolio_config');
        if($conn->isTableExists($tableCategory) != true){
            $table=$conn->newTable($tableCategory);
            $columns=[
                "id" => [
                    "type" => Table::TYPE_INTEGER,
                    "size" => null,
                    "options" => [
                        "identity" => true,
                        "unsigned" => true,
                        "nullable" => false,
                        "primary"  => true,
                    ]
                ],
                "name" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ]
            ];

            foreach($columns as $name=>$value){
                $table->addColumn(
                    $name,
                    $value["type"],
                    $value["size"],
                    $value["options"]);
            }
            $table->setOption("charset","utf8");
            $conn->createTable($table);
        }

        if($conn->isTableExists($tableConfig) != true){
            $table=$conn->newTable($tableConfig);
            $columns=[
                "id" => [
                    "type" => Table::TYPE_INTEGER,
                    "size" => null,
                    "options" => [
                        "identity" => true,
                        "unsigned" => true,
                        "nullable" => false,
                        "primary"  => true,
                    ]
                ],
                "title" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => '2M',
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                        ]
                ],
                "description" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => '2M',
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "keywords" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => '2M',
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "count_row" => [
                    "type" => Table::TYPE_INTEGER,
                    "size" => null,
                    "options" => [
                        "nullable" => false
                    ]
                ]

            ];

            foreach($columns as $name=>$value){
                $table->addColumn(
                    $name,
                    $value["type"],
                    $value["size"],
                    $value["options"]);
            }
            $table->setOption("charset","utf8");
            $conn->createTable($table);
        }


        if($conn->isTableExists($tablePortfolio) != true){
            $table2=$conn->newTable($tablePortfolio);
            $columns=[
                "id" => [
                    "type" => Table::TYPE_INTEGER,
                    "size" => null,
                    "options" => [
                        "identity" => true,
                        "unsigned" => true,
                        "nullable" => false,
                        "primary"  => true,
                    ]
                ],
                "thumbnail" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "image" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "client" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "project" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "skill" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => 255,
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "status" => [
                    "type" => Table::TYPE_BOOLEAN,
                    "size" => null,
                    "options" => [
                        "nullable" => false,
                        "default" => true
                    ]
                ],
                "content" => [
                    "type" => Table::TYPE_TEXT,
                    "size" => '2M',
                    "options" => [
                        "nullable" => false,
                        "default" => ""
                    ]
                ],
                "category_id" => [
                    "type" => Table::TYPE_INTEGER,
                    "size" => null,
                    "options" => [
                        "nullable" => false,
//                        "default" => ""
                    ]
                ],

            ];

            foreach($columns as $name=>$value){
                $table2->addColumn(
                    $name,
                    $value["type"],
                    $value["size"],
                    $value["options"]);
            }

//            $setup->getConnection()->addForeignKey(
//                $setup->getFkName('portfolio', 'category_id', 'portfolio_category', 'id'),
//                'portfolio',
//                $setup->getTable('portfolio_category'),
//                'portfolio_category',
//                \Magento\Framework\DB\Ddl\Table::ACTION_NO_ACTION
//            );
            $table2->setOption("charset","utf8");
            $conn->createTable($table2);
        }

        $setup->endSetup();
    }
}