<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-teacher" role="main">
<div class="container">

<header class="cp-nav-attrValues">
    <table class="table">
        <tbody>
            <tr>
                <th width="120" scope="row">所在城市：</th>
                <td>
                	<ul class="list-unstyled clearfix">
        <!--active为选中类-->
        <li<?php echo $city === "" ? " class='active'" : ""; ?>>
            <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('city' => ''))); ?>">全部</a>
        </li>
        <li<?php echo $city === "110100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('city' => '110100'))); ?>">北京</a>
        </li>
        <li<?php echo $city === "310100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('city' => '310100'))); ?>">上海</a>
        </li>
        <li<?php echo $city === "440100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('city' => '440100'))); ?>">广州</a>
        </li>
        <li<?php echo $city === "131182" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('city' => '131182'))); ?>">深圳</a>
        </li>
    </ul>
                </td>
            </tr>
            <tr>
                <th width="120" scope="row">导师分类：</th>
                <td>
        <ul class="list-unstyled clearfix">
                        <!--active为选中类-->
                        <li <?php echo $cat == "" ? " class='active'" : "" ?>>
        	                <a href="<?php echo Yii::app() -> createUrl('teacher', array_merge($_GET, array('cat' => ''))); ?>">全部</a>
                        </li>
                        <?php foreach ($catalogs as $catalog) { ?>
                        <li <?php if ($catalog->id == $_GET['cat']) { ?>class="active"<?php } ?>>
            	            <a href="<?php echo Yii::app() -> createUrl('teacher', array_merge($_GET, array('cat' => $catalog -> id))); ?>"><?php echo $catalog -> catalog_name; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</header>

<div class="cp-tabpanel" role="tabpanel">

<!--搜索-->
<div class="search-teacher">
    <?php echo CHtml::beginForm(array('index'), 'GET') ?>
    <div class="form-inline">
        <div class="form-group">
            <!--placeholde为html5占位符属性，用户点击-输入之后文字消失，区别于value-->
            <input type="text" name="name" placeholder="找老师，戳这里呗" class="form-control" value="<?= $name; ?>"/>
        </div>
        <button type="submit" class="btn btn-default">搜索</button>
    </div>
    <?php echo CHtml::endForm(); ?>
</div>

<!-- Nav tabs -->
<ul class="nav nav-tabs" id="myTab">
<?php $popularity_cur = ($sort != 'review' AND $sort != 'id') ? 'class="active"' : '';
	$popularity_url = Yii::app() -> createUrl('teacher', array_merge($_GET, array('sort' => 'popularity')));
	;
    ?>
    <li <?php echo $popularity_cur ?>>
        <a href="<?php echo $popularity_url ?>">人气</a>
    </li>
    <?php $review_cur = $sort == 'review' ? 'class="active"' : '';
	$review_url = Yii::app() -> createUrl('teacher', array_merge($_GET, array('sort' => 'review')));
	;
    ?>
    <li <?php echo $review_cur ?>>
        <a href="<?php echo $review_url ?>">评价</a>
    </li>
    <?php $id_cur = $sort == 'id' ? 'class="active"' : '';
	$id_url = Yii::app() -> createUrl('teacher', array_merge($_GET, array('sort' =>'id')));
	;
    ?>
    <li <?php echo $id_cur ?>>
        <a href="<?php echo $id_url ?>">最新</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane fade in active">

        <!--列表-->
        <?php if (empty($teachers)): ?>
            <div style="text-align: center; padding: 3em;">该分类暂无导师</div>
        <?php endif; ?>

        <?php
        foreach ($teachers as $teacher):
            $TeacherUrl = Yii::app()->createUrl('teacher/view', array('id' => $teacher->id));
            $TeacherCatalogName = Catalog::model()->findByAttributes(array('id' => $teacher->catalog_id));
            ?>

            <section class="list-teacher cp-media-sm cp-border-dotted">

                <figure class="media">
                    <div class="media-left">
                        <a href="<?php echo $TeacherUrl ?>">
                            <img class="media-object" src="<?php echo $teacher->pic ?>">
                        </a>
                    </div>

                    <figcaption class="media-body">
                        <div class="row">
                            <div class="col-xs-9">
                                <a class="media-heading" href="<?php echo $TeacherUrl ?>">
                                    <?php echo $teacher->name ?>
                                </a>

                                <span class="center-block good">擅长领域：<?php echo $TeacherCatalogName -> catalog_name; ?></span>

                                <ul class="list-inline">
                                    <li>从业经验：<?php echo $teacher->experience ?>年</li>
                                    <li>人气：<?php echo $teacher->popularity ?></li>
                                </ul>

                            </div>
                            <div class="col-xs-3">
                                <a href="<?php echo $TeacherUrl ?>" class="btn btn-red btn-sm btn-sm-padding pull-right" title="了解更多" role="button">了解更多</a>

                            </div>

                        </div>

                        <p class="text-justify"><?php echo $teacher->profile ?>
                        </p>
                    </figcaption>
                </figure>

            </section>
        <?php endforeach; ?>
        <!--/.list-teacher end-->

    </div>
    <!--/.人气 end-->
</div>
<!--分页-->
<nav class="text-center cp-pagination">
    <!--active为选中类-->
    <!--disabled为禁用属性-->
    <!--当前页属于首页或者末页时，应当为"上一页"和"下一页"添加disabled禁用属性-->
    <?php if ($pager->pageCount > 1 || true) { ?>
        <ul class="pagination pagination-sm">
            <li><a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('page' => 1))) ?>">页首</a>
            </li>
            <li>
                <?php if ($pager->currentPage == 0) { ?>
                    <a disabled href="#" aria-label="Previous">
                        <span aria-hidden="true">上一页</span>
                    </a>
                <?php } else { ?>
                    <a disabled href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
                        <span aria-hidden="true">上一页</span>
                    </a>
                <?php } ?>

                <?php
                $page = intval($pager->currentPage + 1) == 0 ? 1 : intval($pager->currentPage + 1); //当前页码

                $num = 5; //显示页码个数
                $total = $pager->pageCount; //总页数

                $start = 0; //开始页码
                $end = 0; //末尾页码

                if ($page > $total) {
                    $page = $total;
                }

                $nums1 = intval($num / 2); //开始项当前的个数
                $nums2 = $num % 2 == 0 ? $nums1 - 1 : $nums1; //末尾项当前的个数 判断是偶数还是奇数,是偶数就减1

                if ($page <= $num - $nums2) { //当前页数小于或等于显示页码减去末尾项,当前位置还处于页码范围
                    $start = 1;
                    $end = $num;
                } else {
                    $start = $page - $nums1;
                    $end = $page + $nums2;
                }

                /* 当计算出来的末尾项大于总页数 */
                if ($end > $total) {
                    $start = ($total - $num) + 1 > 0 ? ($total - $num) + 1 : 1; //开始项等于总页数减去要显示的数量然后再自身加1

                    $end = $total;
                }
                for ($i = $start;
                $i <= $end;
                $i++) {
                ?>
            <li <?= $i == $page ? 'class="active"' : '' ?>><a
                    href='<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
            </li>
            <?php } ?>
            <li>
                <?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">下一页</span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
                        <span aria-hidden="true">下一页</span>
                    </a>
                <?php } ?>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('teacher', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
            </li>

        </ul>
    <?php } ?>
</nav>

<!--热门课程-->
<!--<footer class="cp-thumbnail cp-subject cp-picture-effect">
                <h4>热门课程</h4>

                <div class="row">
                    <div class="col-xs-4">
                        <div class="thumbnail">
                            <a href="subject-detail.html">
                                <img class="img-responsive" src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/hot-p1.jpg">
                            </a>
                            <div class="caption">
                                <a href="subject-detail.html" class="btn btn-red btn-sm  pull-right" title="了解更多" role="button">了解更多</a>

                                <h4 class="clearfix">
                                    <span class="title pull-left">茶道的精华 </span>
                                    <span class="price pull-left"><i class="fa fa-jpy"></i>60</span>
                                </h4>

                                <ul class="list-inline">
                                    <li>主讲人：李三</li>
                                    <li>时间：2015.05.12</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </footer>-->
<!--/.cp-subject end-->

</div>
<!--/.cp-tabpanel end-->

</div>
</main>

<!--图片滑过特效-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/modernizr.custom.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.hoverdir.js"></script>
<script>
	$(function() {
		$('#cp-recom-thumbs > figure').each(function() {
			$(this).hoverdir();
		});
	});
</script>
<!--/.site-main end -->