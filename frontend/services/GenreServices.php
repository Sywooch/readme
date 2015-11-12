<?php

namespace app\services;

use app\dao\GenreDAO;
use app\models\GenreModel;
use yii\db\Query;

class GenreServices {

    protected function dao()
    {
        return new GenreDAO();
    }

    protected function categoryServices()
    {
        return new CategoryServices();
    }

    public function getFilterOptionsGenres()
    {
        $options = array();
        if($categories = self::categoryServices()->getAllCategories()) {
            foreach($categories as $category){
                if($genres = self::dao()->findFilterOptionsGenres($category->categoryID)) {
                    $options[] = ['catId' => $category->categoryID,
                        'catName' => $category->categoryName,
                        'catList' => $genres];
                }
            }
            return $options;
        } else {
            return array();
        }
    }

    public function getAllGenresOfBookById($id) {
        if($data = self::dao()->findAllGenresOfBookById($id)) {
            foreach ($data as $row) {
                $genre = new GenreModel();
                $genre->id = $row['genre_id'];
                $genre->name = $row['name'];

                $genres[] = $genre;
            }

            return $genres;
        } else {
            return array();
        }
    }

    public function getAllGenresOfAuthorById($id) {
        if($data = self::dao()->findAllGenresOfAuthorById($id)) {
            foreach ($data as $row) {
                $genre = new GenreModel();
                $genre->id = $row['genre_id'];
                $genre->name = $row['name'];

                $genres[] = $genre;
            }

            return $genres;
        } else {
            return array();
        }
    }
}
?>