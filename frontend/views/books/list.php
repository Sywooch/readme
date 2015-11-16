<?php

$this->registerJsFile('@web/js/filterpopup.js', ['position' => $this::POS_BEGIN], 'filterpopup');

use yii\helpers\Html;
use app\helpers\CatalogLinkPager;
use app\helpers\MyBreadcrumbs;

$this->title = 'Книги';
$this->params['breadcrumbs'][] = $this->title;

$sort = isset($_GET['sort']) ? $_GET['sort'] : 'year';
$ord = isset($_GET['ord']) ? $_GET['ord'] : 'desc';
$per = isset($_GET['per']) ? $_GET['per'] : '30';
$c = isset($_GET['c']) ? $_GET['c'] : array();
$lang = isset($_GET['lang']) ? $_GET['lang'] : array();
$langor = isset($_GET['langor']) ? $_GET['langor'] : array();
$g = isset($_GET['g']) ? $_GET['g'] : array();
$ph = isset($_GET['ph']) ? $_GET['ph'] : array();
$year = isset($_GET['year']) ? $_GET['year'] : '';
$yeq = isset($_GET['yeq']) ? $_GET['yeq'] : 'e';

?>
<div id="sidebar-left" class="cols sidebar">
    <div id="sidebar-left-content">

        <?php include_once("../views/layouts/menu.php"); ?>

    </div>
</div>

<div id="main-content" class="cols">
    <div id="main_content">
        <div>
            <?= MyBreadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Home'),
                    'url' => Yii::$app->homeUrl,
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

        </div>
        <div class="books_list">

            <?php if (count($books) > 0) { ?>
                <div class="catalog">
                    <?php foreach ($books as $book) { ?>
                        <div class="item">
                            <div class="itemImg">
                                <a href="<?php echo Yii::$app->homeUrl . 'books/' . $book->id; ?>" class="img">
                                    <img src="<?php echo $book->img; ?>" alt="" width="130" height="195"/>
                                </a>
                            </div>
                            <div class="bookTitle">
                                <a href="<?php echo Yii::$app->homeUrl . 'books/' . $book->id; ?>">
                                    <?php echo '&ldquo;' . $book->title . '&rdquo;'; ?>
                                </a>
                            </div>
                            <div class="bookAuthor">
                                <?php for ($i = 0; $i < count($book->authors); $i++) { ?>
                                    <a href="<?php echo Yii::$app->homeUrl . 'authors/' . $book->authors[$i]->id; ?>">
                                        <?php echo $book->authors[$i]->fullName; ?>
                                    </a>
                                    <?php if ((count($book->authors) > 1) && ($i < count($book->authors) - 1)) echo ', ';
                                } ?>
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
                    На жаль, жодної книги за заданими критеріями не знайдено.
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<div id="sidebar-right" class="cols sidebar">

    <div id="sidebar-right-content">
        <form action="books" method="get">

            <div class="box">
                <div class="title">Фільтрувати</div>
                <div class="content">
                    <div class="sort-wrapper">
                        <div class="helper">відсортувати книги за:</div>
                        <select class="sort" name="sort" onchange="this.form.submit()">
                            <option value="title" <?php echo $sort == 'title' ? 'selected' : ''; ?>>назвою</option>
                            <option value="rating" <?php echo $sort == 'rating' ? 'selected' : ''; ?>>популярністю</option>
                            <option value="year" <?php echo $sort == 'year' ? 'selected' : ''; ?>>роком видання
                            <option value="pages" <?php echo $sort == 'pages' ? 'selected' : ''; ?>>кількістю сторінок
                            <option value="circ" <?php echo $sort == 'circ' ? 'selected' : ''; ?>>тиражем
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


                            <div class="filterPopupContainer" >
                                <div class="filterButtonBox">
                                    <div class="filterButton buttonGreyLight" >[ інші країни ]</div>
                                </div>
                                <div class="popup" >
                                    <div class="title" >
                                        <div class="closeIcon" ></div>
                                        інші країни
                                    </div>
                                    <div class="scroller" >
                                        <?php for ($i = 10; $i < count($countryOptions); $i++) {  ?>
                                            <div>
                                                <input type="checkbox" name="c[]" value="<?php echo $countryOptions[$i]->id; ?>"
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

                <div class="title">Рік видання</div>
                <div class="content">
                    <label>
                        <input type="radio" name="yeq" value="b" <?php echo $yeq == 'b' ? 'checked' : ''; ?>
                               onchange="this.form.submit()">до
                    </label>
                    <label>
                        <input type="radio" name="yeq" value="e" <?php echo $yeq == 'e' ? 'checked' : ''; ?>
                               onchange="this.form.submit()">рівно
                    </label>
                    <label><input type="radio" name="yeq" value="a" <?php echo $yeq == 'a' ? 'checked' : ''; ?>
                                  onchange="this.form.submit()">після
                    </label>

                    <input type="text" name="year" value="<?php echo $year; ?>" onkeyup="this.form.submit()">
                </div>
            </div>

            <div class="box">

                <?php if (count($langOptions) > 0) { ?>
                    <div class="title">Мова</div>
                    <div class="content">
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <div>
                                <label>
                                    <input type="checkbox" name="lang[]" value="<?php echo $langOptions[$i]->id; ?>"
                                        <?php echo in_array($langOptions[$i]->id, $lang) ? 'checked' : ''; ?>
                                           onchange="this.form.submit()" />&nbsp;<?php echo $langOptions[$i]->name; ?>
                                </label>
                            </div>
                        <?php } ?>


                            <div class="filterPopupContainer" >
                                <div class="filterButtonBox">
                                    <div class="filterButton buttonGreyLight" >[ інші мови ]</div>
                                </div>
                                <div class="popup" >
                                    <div class="title" >
                                        <div class="closeIcon" ></div>
                                        інші мови
                                    </div>
                                    <div class="scroller" >
                                        <?php for ($i = 10; $i < count($langOptions); $i++) {  ?>
                                            <div>
                                                <input type="checkbox" name="lang[]" value="<?php echo $langOptions[$i]->id; ?>"
                                                    <?php echo in_array($langOptions[$i]->id, $lang) ? 'checked' : ''; ?>
                                                       onchange="this.form.submit()"/>&nbsp;<?php echo $langOptions[$i]->name; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                    </div>
                <?php } ?>
            </div>

            <div class="box">
                <?php if (count($langOrigOptions) > 0) { ?>
                    <div class="title">Мова оригіналу</div>

                    <div class="content">
                        <?php for ($i = 0; $i < 10; $i++) { ?>
                            <div>
                                <input type="checkbox" name="langor[]" value="<?php echo $langOrigOptions[$i]->id; ?>"
                                    <?php echo in_array($langOrigOptions[$i]->id, $langor) ? 'checked' : ''; ?>
                                       onchange="this.form.submit()"/>&nbsp;<?php echo $langOrigOptions[$i]->name; ?>
                            </div>
                        <?php } ?>

                            <div class="filterPopupContainer" >
                                <div class="filterButtonBox">
                                    <div class="filterButton buttonGreyLight" >[ інші мови ]</div>
                                </div>
                                <div class="popup" >
                                    <div class="title" >
                                        <div class="closeIcon" ></div>
                                        інші мови
                                    </div>
                                    <div class="scroller" >
                                        <?php for ($i = 10; $i < count($langOrigOptions); $i++) {  ?>
                                            <div>
                                                <input type="checkbox" name="langor[]" value="<?php echo $langOrigOptions[$i]->id; ?>"
                                                    <?php echo in_array($langOrigOptions[$i]->id, $langor) ? 'checked' : ''; ?>
                                                       onchange="this.form.submit()"/>&nbsp;<?php echo $langOrigOptions[$i]->name; ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                    </div>
                <?php } ?>
            </div>
        </form>

    </div>

</div>

