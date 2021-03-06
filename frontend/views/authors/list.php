<?php
//$this->registerJs('alert("Hello world!")', $this::POS_LOAD, 'main-index');
//$this->registerJsFile('@web/js/sidebarmenu.js', ['position' => $this::POS_BEGIN], 'sidebarmenu');
//$this->registerJsFile('@web/js/filterpopup.js', ['position' => $this::POS_BEGIN], 'filterpopup');

use app\helpers\CatalogLinkPager;
use app\helpers\MyBreadcrumbs;

$this->title = 'Автори';
$this->params['breadcrumbs'][] = $this->title;

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'rating';
$ord = isset($_GET['ord']) ? $_GET['ord'] : 'desc';
$per = isset($_GET['per']) ? $_GET['per'] : '30';
$c = isset($_GET['c']) ? $_GET['c'] : array();
$byear = isset($_GET['byear']) ? $_GET['byear'] : '';
$byeq = isset($_GET['byeq']) ? $_GET['byeq'] : 'e';
$dyear = isset($_GET['dyear']) ? $_GET['dyear'] : '';
$dyeq = isset($_GET['dyeq']) ? $_GET['dyeq'] : 'e';

?>
<div id="sidebar-left" class="cols sidebar">
    <div id="sidebar-left-content">

        <?php include_once("../views/layouts/menu.php"); ?>

    </div>
</div>

<div id="main-content" class="cols">
    <div id="main_content">
        <?php /*echo '<pre>'; */ ?><!--
        <?php /*print_r($genreOptions); */ ?>
        --><?php /*echo '</pre>'; */?>
        <div>
            <?= MyBreadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Home'),
                    'url' => Yii::$app->homeUrl,
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </div>
        <div class="authors_list">
            <?php if (count($authors) > 0) { ?>

                <div class="catalog">
                    <?php
                    foreach ($authors as $author) { ?>
                        <div class="item">
                            <div class="itemImg">
                                <a href="<?php echo Yii::$app->homeUrl . 'authors/' . $author->id; ?>" class="img">
                                    <img src="<?php echo $author->img; ?>" alt="" width="130" height="195"/>
                                </a>

                            </div>
                            <div class="authorName">
                                <a href="<?php echo Yii::$app->homeUrl . 'authors/' . $author->id; ?>">
                                    <?php echo $author->fullName; ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

                <div class="pagination-pan">
                    <?php

                    echo CatalogLinkPager::widget([
                        'pagination' => $pages,
                    ]);

                    ?>
                </div>
            <?php } else { ?>
                <div class="notification">
                    На жаль, жодного автора за заданими критеріями не знайдено.
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="sidebar-right" class="cols sidebar">

    <div id="sidebar-right-content">
        <form action="authors" method="get">

            <div class="box">
                <div class="title">Фільтрувати</div>
                <div class="content">
                    <div class="sort-wrapper">
                        <div class="helper">відсортувати авторів за:</div>
                        <select class="sort" name="sort" onchange="this.form.submit()">
                            <option value="name" <?php echo $sort == 'name' ? 'selected' : ''; ?>>ім’ям</option>
                            <option value="rating" <?php echo $sort == 'rating' ? 'selected' : ''; ?>>популярністю
                            <option value="byear" <?php echo $sort == 'byear' ? 'selected' : ''; ?>>роком народження
                            </option>
                        </select>
                    </div>
                    <div class="ord-wrapper cols">
                        <div class="helper">впорядкувати:</div>
                        <select class="ord" name="ord" onchange="this.form.submit()">
                            <option value="asc" <?php echo $ord == 'asc' ? 'selected' : ''; ?>>зростанням</option>
                            <option value="desc" <?php echo $ord == 'desc' ? 'selected' : ''; ?>>спаданням</option>
                        </select>
                    </div>
                    <div class="per-wrapper cols">
                        <div class="helper">показати:</div>
                        <select class="per" name="per" onchange="this.form.submit()">
                            <option value="30" <?php echo $per == '30' ? 'selected' : ''; ?>>30</option>
                            <option value="60" <?php echo $per == '60' ? 'selected' : ''; ?>>60</option>
                            <option value="120" <?php echo $per == '120' ? 'selected' : ''; ?>>120</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="box">
                <?php if (count($countryOptions) > 0) { ?>
                    <div class="title">Країна</div>

                    <div class="content">
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <div>
                                <input type="checkbox" name="c[]" value="<?php echo $countryOptions[$i]->id; ?>"
                                    <?php echo in_array($countryOptions[$i]->id, $c) ? 'checked' : ''; ?>
                                       onchange="this.form.submit()"/>&nbsp;<?php echo $countryOptions[$i]->name; ?>
                            </div>
                        <?php } ?>


                        <div class="filterPopupContainer">
                            <div class="filterButtonBox">
                                <div class="filterButton buttonGreyLight">[ інші країни ]</div>
                            </div>
                            <div class="popup">
                                <div class="title">
                                    <div class="closeIcon"></div>
                                    всі країни
                                </div>
                                <div class="scroller">
                                    <?php for ($i = 10; $i < count($countryOptions); $i++) { ?>
                                        <div>
                                            <input type="checkbox" name="c[]"
                                                   value="<?php echo $countryOptions[$i]->id; ?>"
                                                <?php echo in_array($countryOptions[$i]->id, $c) ? 'checked' : ''; ?>
                                                   onchange="this.form.submit()"/>&nbsp;<?php echo $countryOptions[$i]->name; ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            </div>

            <div class="box">

                <div class="title">Рік народження</div>
                <div class="content">
                    <label>
                        <input type="radio" name="byeq" value="b" <?php echo $byeq == 'b' ? 'checked' : ''; ?>
                               onchange="this.form.submit()">до
                    </label>
                    <label>
                        <input type="radio" name="byeq" value="e" <?php echo $byeq == 'e' ? 'checked' : ''; ?>
                               onchange="this.form.submit()">рівно
                    </label>
                    <label><input type="radio" name="byeq" value="a" <?php echo $byeq == 'a' ? 'checked' : ''; ?>
                                  onchange="this.form.submit()">після
                    </label>

                    <input type="text" name="byear" value="<?php echo $byear; ?>" onkeyup="this.form.submit()">
                </div>
            </div>

            <div class="box">

                <div class="title">Рік смерті</div>
                <div class="content">
                    <label>
                        <input type="radio" name="dyeq" value="b" <?php echo $dyeq == 'b' ? 'checked' : ''; ?>
                               onchange="this.form.submit()">до
                    </label>
                    <label>
                        <input type="radio" name="dyeq" value="e" <?php echo $dyeq == 'e' ? 'checked' : ''; ?>
                               onchange="this.form.submit()">рівно
                    </label>
                    <label><input type="radio" name="dyeq" value="a" <?php echo $dyeq == 'a' ? 'checked' : ''; ?>
                                  onchange="this.form.submit()">після
                    </label>

                    <input type="text" name="dyear" value="<?php echo $dyear; ?>" onkeyup="this.form.submit()">
                </div>
            </div>
        </form>
    </div>

</div>
