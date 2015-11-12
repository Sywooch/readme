<?php

namespace app\dao;

use yii\db\Query;
use Yii;

class CategoryDAO
{

    public function findAllCategories()
    {
        $sql = "SELECT `category_id`, `name` FROM `tbl_categories` ORDER BY `name` ASC";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
}

?>