<!--滚动条UI-->
<script src="//cdn.bootcss.com/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
<script src="//cdn.bootcss.com/jScrollPane/2.0.22/script/jquery.jscrollpane.min.js"></script>
<script>
$(function() {
	$('.scroll-pane').jScrollPane({
		verticalDragMinHeight: 100,
		verticalDragMaxHeight: 160
	});
});
</script>

<main class="site-main md-teacher-detail" role="main">
<div class="container">

<header class="cp-detail-header">
    <figure class="media cp-media-lager">
        <div class="media-left">
            <img class="media-object" src="<?= '/' . $teacher->pic ?>" width="200" height="241">
        </div>

        <figcaption class="media-body">
            <?php $TeacherCatalogName = Catalog::model() -> findAllByAttributes(array('id' => $teacher -> catalog_id)); ?>
            <h3 class="media-heading"><?php echo $teacher->name ?></h3>

            <span class="center-block good">擅长领域：<?php echo $TeacherCatalogName[0]->catalog_name ?></span>
            <ul class="list-inline">
                <li>从业经验：<?php echo $teacher->experience ?>年</li>
                <li>人气：<?php echo $teacher->popularity ?></li>
            </ul>

            <!--我是一条分割线-->
            <hr>
            <p class="text-justify">
                <?php echo $teacher->profile ?>
            </p>

            <?php if ($is_focus === null) : ?>

                <a href="<?= $this->createUrl('/student/teacher/focus', array('id' => $teacher->id)) ?>" class="btn btn-red btn-sm btn-sm-padding" title="关注导师" role="button">关注导师</a>
				
            <?php else: ?>
                <a href="javascript:void(-1)" class="btn btn-red btn-sm btn-sm-padding" title="已关注" role="button">已关注</a>
            <?php endif; ?>
        </figcaption>
    </figure>
</header>
<!--/.md-subject-detail-header END-->

<div class="cp-tabpanel cp-tabpanel-detail" role="tabpanel">

<div class="row match-height">
    <div class="col-xs-8 match-item">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="detailTab">
            <?php $teacher_cur = ($list == teacher) ? 'class="active"' : '';
			$teacher_curr = ($list == teacher) ? 'active' : '';

			$teacher_url = Yii::app() -> createUrl('teacher/view', array_merge($_GET, array('list' => teacher, 'page' => 1)));
			;
            ?>
            <li role="presentation" <?php echo $teacher_cur ?>><a href="<?php echo $teacher_url ?>">导师介绍</a>
            </li>


			<?php $lesson_cur = ($list == lesson OR $list == '') ? 'class="active"' : '';
			$lesson_curr = ($list == lesson OR $list == '') ? 'active' : '';

			$lesson_url = Yii::app() -> createUrl('teacher/view', array_merge($_GET, array('list' => lesson, 'page' => 1)));
			;
            ?>
            <li role="presentation" <?php echo $lesson_cur ?>><a href="<?php echo $lesson_url ?>">近期课程</a>
            </li>


			<?php $review_cur = $list == review ? 'class="active"' : '';
			$review_curr = $list == review ? 'active' : '';

			$review_url = Yii::app() -> createUrl('teacher/view', array_merge($_GET, array('list' => review, 'page' => 1)));
			;
            ?>
            <li role="presentation" <?php echo $review_cur ?>><a href="<?php echo $review_url ?>">学员感悟</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content match-height">

			 <div role="tabpanel" class="tab-pane fade in <?php echo $teacher_curr ?>" id="<?php echo $teacher_url ?>">
                <!--列表-->


                <?php if ($list == 'teacher' || $list == '') {
                        ?>
                   
                        <section class="list-teacher cp-media-sm cp-border-dotted">
						 <figcaption class="media-body">
							<div style="text-align: center; padding: 3em;"><?php echo($teacher->profile);?></div>
							</figcaption>
                        </section>
                    <?php 
							}
 ?>


                <!--/.list-subject END-->

            </div>
            <div role="tabpanel" class="tab-pane fade in <?php echo $lesson_curr ?>" id="<?php echo $lesson_url ?>">
                <!--列表-->

				
                <?php if ($list == 'lesson' || $list == '') {
                    if (empty($lessons)):
                        ?>
                        <div style="text-align: center; padding: 3em;">暂无课程</div>
                    <?php endif;
							foreach ($lessons as $result):
                        ?>
                        <section class="list-teacher cp-media-sm cp-border-dotted">

                            <figure class="media">
                                <div class="media-left">
                                    <a href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $result -> id)); ?>">
                                        <img class="media-object" src="<?= $result->pic ?>">
                                    </a>
                                </div>

                                <figcaption class="media-body">
                                    <div class="row">
                                        <div class="col-xs-9">
                                            <h3 class="media-heading"><?= $result->name ?></h3>
                                            <ul class="list-inline">
                                                <li>
                                                    时间：<?= DATE_FORMAT(DATE_CREATE($result->start_date_time), 'Y.m.d') ?>
                                                    至 <?= DATE_FORMAT(DATE_CREATE($result -> end_date_time), 'Y.m.d'); ?>
                                                </li>
                                            </ul>

                                        </div>
                                        <div class="col-xs-3">
                                            <a href="<?= Yii::app() -> createUrl('lesson/view', array('id' => $result -> id)); ?>" class="btn btn-red btn-sm btn-sm-padding pull-right" title="了解更多" role="button">了解更多</a>
                                        </div>

                                    </div>

                                    <p class="text-justify"><?php echo $result->summary ?>
                                    </p>
                                </figcaption>
                            </figure>

                        </section>
                    <?php endforeach;
							}
 ?>


                <!--/.list-subject END-->

            </div>

            <div role="tabpanel" class="tab-pane  fade in <?= $review_curr ?>" id="<?php echo $review_url ?>">
                <?php if ($list == 'review') {
                    if (empty($reviews)):
                        ?>
                        <div style="text-align: center; padding: 3em;">暂无评论</div>
                    <?php endif;
							foreach ($reviews as $result):
                        ?>
                        <section class="cp-media-sm cp-border-dotted list-comment">
                            <figure class="media">
                                <div class="media-left">
                                    <img class="media-object" src="<?= $result['pic'] ?>" width="80">
                                </div>
                                <figcaption class="media-body">
                                    <?= $result['contents'] ?>
                                    <span class="text-right center-block date"><?= date('Y年m月d日 H:i', $result['ctime']) ?></span>
                                </figcaption>
                            </figure>
                        </section>
                    <?php endforeach;
							}
 ?>
                <!--/.list-comment END-->

                <?php if ($userType === 'student'): ?>
                    <div class="admin-top-bar admin-form">
                        <?php $form = $this -> beginWidget('CActiveForm', array('enableAjaxValidation' => false, 'htmlOptions' => array('class' => 'form-horizontal'))); ?>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <?php echo $form -> textArea($reviewModel, 'contents', array('rows' => 6, 'class' => 'form-control', 'placeholder' => '对名师的评价、感悟')); ?>
                                <?php echo $form -> error($reviewModel, 'contents'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-9">
                                <button type="submit" class="btn btn-red btn-sm btn-lger-padding">确认提交</button>
                            </div>
                        </div>

                        <?php $this -> endWidget(); ?>
                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>
    <!--Tabs END-->

    <div class="col-xs-4 match-item">

        <div class="scroll-pane">

            <div class="md-book-wrap">
                <h4>出版著作</h4>
                <?php if (empty($books)): ?>
                    <div style="text-align: center; padding: 3em;">暂无著作</div>
                <?php endif; ?>
                <ul class="list-unstyled list-book">
                    <?php foreach ($books as $book): ?>
                        <li class="clearfix match-height">
                            <div class="col-xs-4 match-item">
                                <span class="center-block date"><?php echo $book->year ?></span>
                            </div>
                            <div class="col-xs-8 match-item">
                                <figure class="text-center">
                                    <img src="<?= $book -> pic ?>" width="170">
                                    <figcaption>《<?php echo $book->name ?>》</figcaption>
                                </figure>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <!--/.md-book-wrap END-->
        </div>
        <!--/.scroll-pane END-->
    </div>
</div>

<!--分页-->
<nav class="text-center cp-pagination">
    <?php if ($pagerLesson->pageCount > 1 || true) { ?>
        <ul class="pagination pagination-sm">
            <li>
                <a href="<?php echo Yii::app()->createUrl("teacher/view", array_merge($_GET, array('page' => 1))) ?>">页首</a>
            </li>
            <li>
                <?php if ($pager->currentPage == 0) { ?>
                    <a disabled href="#" aria-label="Previous">
                        <span aria-hidden="true">上一页</span>
                    </a>
                <?php } else { ?>
                    <a disabled href="<?php echo Yii::app()->createUrl("teacher/view", array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
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
                    href='<?php echo Yii::app()->createUrl('teacher/view', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
            </li>
            <?php } ?>
            <li>
                <?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">下一页</span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo Yii::app()->createUrl('teacher/view', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
                        <span aria-hidden="true">下一页</span>
                    </a>
                <?php } ?>
            </li>
            <li>
                <a href="<?php echo Yii::app()->createUrl('teacher/view', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
            </li>

        </ul>
    <?php } ?>
</nav>

</div>

</div>
</main>
