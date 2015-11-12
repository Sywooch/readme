<?php

namespace app\services;

use app\dao\CategoryDAO;
use app\models\GenreModel;
use yii\db\Query;

class CategoryServices {

    protected function dao()
    {
        return new CategoryDAO();
    }

    public function getAllCategories()
    {
        if($data = self::dao()->findAllCategories()) {
            foreach ($data as $row) {
                $category = new GenreModel();
                $category->categoryID = $row['category_id'];
                $category->categoryName = $row['name'];

                $categories[] = $category;
            }

            return $categories;
        } else {
            return array();
        }
    }
}
?>