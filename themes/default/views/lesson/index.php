<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-subject" role="main">
<div class="container">

<header class="cp-nav-attrValues">
    <table class="table">
        <tbody>
            <tr>
                <th width="120" scope="row">课程分类：</th>
                <td>
                	<ul class="list-unstyled clearfix">
                        <!--active为选中类-->
                        <li <?php echo $cat == "" ? " class='active'" : "" ?>>
        	                <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('cat' => ''))); ?>">全部</a>
                        </li>
                        <?php foreach ($catalogs as $catalog) { ?>
                        <li <?php if ($catalog->id == $_GET['cat']) { ?>class="active"<?php } ?>>
            	            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('cat' => $catalog -> id))); ?>"><?php echo $catalog -> catalog_name; ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </td>
            </tr>
            <tr>
                <th width="120" scope="row">所在城市：</th>
                <td>
                    <ul class="list-unstyled clearfix">
        <!--active为选中类-->
        <li<?php echo $city === "" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('city' => ''))); ?>">全部</a>
        </li>
        <li<?php echo $city === "110100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('city' => '1'))); ?>">北京</a>
        </li>
        <li<?php echo $city === "310100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('city' => '2'))); ?>">上海</a>
        </li>
        <li<?php echo $city === "440100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('city' => '4'))); ?>">广州</a>
        </li>
        <li<?php echo $city === "131182" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('city' => '3'))); ?>">深圳</a>
        </li>
                    </ul>
                </td>
            </tr>
            <tr>
                <th width="120" scope="row">性别限制：</th>
                <td>
                    <ul class="list-unstyled clearfix">
        <li<?php echo $sex === "0" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('sex' => '2'))); ?>">全部</a>
        </li>
        <li<?php echo $sex === "2" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('sex' => '1'))); ?>">男</a></li>
        <li<?php echo $sex === "1" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('sex' => '0'))); ?>">女</a></li>
        <li<?php echo $sex === "3" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app() -> createUrl('lesson', array_merge($_GET, array('sex' => '3'))); ?>">儿童</a>
        </li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</header>

<div class="cp-tabpanel" role="tabpanel">

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist" id="myTab">
    <li role="presentation" class="active"><a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">最热课程</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="tab">

	        <!--列表-->
        <?php if (empty($lessons)): ?>
            <div style="text-align: center; padding: 3em;">该分类暂无课程</div>
        <?php endif; ?>

        <?php foreach ($lessons as $lesson): ?>
            <section class="list-subject cp-media-sm cp-border-dotted cp-picture-effect">

                <figure class="media">
                    <div class="media-left">
                        <a href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $lesson -> id)); ?>">
                            <img class="media-object" src="<?= $lesson -> pic; ?>">
                        </a>
                    </div>

                    <figcaption class="media-body">
                        <div class="row">
                            <div class="col-xs-9">
                                <a class="media-heading" href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $lesson -> id)); ?>">
                                    <?= $lesson->name ?>
                                </a>

                                <div class="rating-wrap">

                                    <?php $rank = array('0.0' => '0', '0.5' => '0', '1.0' => '1', '1.5' => '1-5', '2.0' => '2', '2.5' => '2-5', '3.0' => '3', '3.5' => '3-5', '4.0' => '4', '4.5' => '4-5', '5.0' => '5'); ?>

                                    <div class="rating-container rating-uni rating-<?= $rank[$lesson->rank] ?>">
                                        <div class="rating-stars"></div>
                                    </div>

                                    <span class="number"><b><?= $lesson->rank ?></b>分</span>

                                </div>
                                <!--rating-wrap END-->

                                <ul class="list-inline">
                                    <?php $teacher = Teacher::model() -> findByAttributes(array('id' => $lesson -> teacher_id)); ?>

                                    <li>主讲人：<?= $teacher->name ?></li>

                                    <li>
                                        时间：<?= DATE_FORMAT(DATE_CREATE($lesson->start_date_time), 'Y.m.d') ?>
                                        至 <?= DATE_FORMAT(DATE_CREATE($lesson -> end_date_time), 'Y.m.d') ?>
                                    </li>
                                </ul>

                            </div>
                            <div class="col-xs-3">
                                <?php $lessonWord = '了解更多' ?>
                                <a href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $lesson -> id)); ?>" class="btn btn-red btn-sm btn-sm-padding pull-right" role="button">
                                    <?= $lessonWord; ?></a>

                            </div>

                        </div>

                        <p class="text-justify"><?= $lesson -> summary ?>
                        </p>
                    </figcaption>
                </figure>

            </section>
        <?php endforeach; ?>

        <!--/.list-subject end-->
    </div>

</div>

<!--分页-->
<nav class="text-center cp-pagination">
    <!--active为选中类-->
    <!--disabled为禁用属性-->
    <!--当前页属于首页或者末页时，应当为"上一页"和"下一页"添加disabled禁用属性-->
    <?php if ($pager->pageCount > 1 || true) { ?>
        <ul class="pagination pagination-sm">
            <li><a href="<?php echo Yii::app()->createUrl('lesson', array_merge($_GET, array('page' => 1))) ?>">页首</a>
            </li>
            <li>
                <?php if ($pager->currentPage == 0) { ?>
                    <a disabled href="#" aria-label="Previous">
                        <span aria-hidden="true">上一页</span>
                    </a>
                <?php } else { ?>
                    <a disabled href="<?php echo Yii::app()->createUrl('lesson', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
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
                    href='<?php echo Yii::app()->createUrl('lesson', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
            </li>
            <?php } ?>
            <li>
                <?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">下一页</span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo Yii::app()->createUrl('lesson', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
                        <span aria-hidden="true">下一页</span>
                    </a>
                <?php } ?>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('lesson', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
            </li>

        </ul>
    <?php } ?>
</nav>

</div>
<!--/.cp-tabpanel end-->

</div>
</main>

<!--图片滑过特效-->
<script src="<?= $this -> _theme -> baseUrl ?>/assets/js/modernizr.custom.js"></script>
<script src="<?= $this -> _theme -> baseUrl; ?>/assets/js/jquery.hoverdir.js"></script>
<script>
	$(function() {
		$('#cp-recom-thumbs > figure').each(function() {
			$(this).hoverdir();
		});
	});
</script>
<!--/.site-main end -->

