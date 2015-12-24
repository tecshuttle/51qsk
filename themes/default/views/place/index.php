<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-place" role="main">
<div class="container">

<header class="cp-nav-attrValues">
    <table class="table">
        <tbody>
            <tr>
                <th width="120" scope="row">所在城市：</th>
                <td>
      <ul class="list-unstyled clearfix">
        <!--active为选中类-->
        <li<?php echo $city === "" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('city' => ''))); ?>">全部</a>
        </li>
        <li<?php echo $city === "110100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('city' => '110100'))); ?>">北京</a>
        </li>
        <li<?php echo $city === "310100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('city' => '310100'))); ?>">上海</a>
        </li>
        <li<?php echo $city === "440100" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('city' => '440100'))); ?>">广州</a>
        </li>
        <li<?php echo $city === "440300" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('city' => '440300'))); ?>">深圳</a>
        </li>
       </ul>
    </td>
    </tr>
            <tr>
                <th width="120" scope="row">供餐情况：</th>
                <td>
                    <ul class="list-unstyled clearfix">
        <!--active为选中类-->
        <li<?php echo $food === "" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('food' => ''))); ?>">全部</a></li>
        <li<?php echo $food === "1" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('food' => '1'))); ?>">有</a></li>
        <li<?php echo $food === "0" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('food' => '0'))); ?>">无</a></li>
 </ul>
       </td>
       </tr>
            <tr>
                <th width="120" scope="row">性别限制：</th>
                <td>
                    <ul class="list-unstyled clearfix">
        <!--active为选中类-->
        <li<?php echo $sex === "" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('sex' => ''))); ?>">全部</a></li>
        <li<?php echo $sex === "1" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('sex' => '1'))); ?>">女</a></li>
        <li<?php echo $sex === "0" ? " class='active'" : "" ?>>
            <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('sex' => '0'))); ?>">男</a></li>
                    </ul>
                </td>
            </tr>
        </tbody>
    </table>
</header>

<div class="cp-tabpanel" role="tabpanel">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist" id="myTab">
        <li role="presentation" class="active"><a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">最热场地</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home">

            <!--列表-->
            <?php foreach ($places as $place): ?>
                <section class="list-place cp-media-sm cp-border-dotted cp-picture-effect">

                    <figure class="media">
                        <div class="media-left">
                            <a href="<?php echo $this->createUrl('/place/view', array('id' => $place->id)) ?>">
                                <img class="media-object" src="<?php echo $place->pic_adr; ?>">
                            </a>
                        </div>

                        <figcaption class="media-body">
                            <div class="row">
                                <div class="col-xs-9">
									<a class="media-heading" href="<?php echo $this->createUrl('/place/view', array('id' => $place->id)) ?>">
										<?php echo $place->name; ?>
									</a>
									
                                    <div class="rating-wrap">
                                        <?php

                                        $rank = array(
                                            '0.0' => '0', '0.5' => '0',
                                            '1.0' => '1', '1.5' => '1-5',
                                            '2.0' => '2', '2.5' => '2-5',
                                            '3.0' => '3', '3.5' => '3-5',
                                            '4.0' => '4', '4.5' => '4-5',
                                            '5.0' => '5'
                                        );
                                        ?>

                                        <div class="rating-container rating-uni rating-<?= $rank[$place->rank] ?>">
                                            <div class="rating-stars"></div>
                                        </div>

                                        <span class="number"><b><?php echo $place->rank; ?></b>分</span>

                                    </div>


                                    <span class="center-block address">地址：<?php echo $place->address; ?></span>

                                </div>
                                <div class="col-xs-3">
                                    <a href="<?php echo $this->createUrl('/place/view', array('id' => $place->id)) ?>" class="btn btn-red btn-sm btn-sm-padding pull-right" title="了解更多" role="button">了解更多</a>

                                </div>

                            </div>

                            <p class="text-justify"><?php echo $place->summary; ?>
                            </p>
                        </figcaption>
                    </figure>

                </section>
            <?php endforeach; ?>

            <!--/.list-place end-->


        </div>

    </div>

    <!--分页-->
    <nav class="text-center cp-pagination">
        <?php if ($pager->pageCount > 1 || true) { ?>
            <ul class="pagination pagination-sm">
                <li>
                    <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('page' => 1))) ?>">页首</a>
                </li>
                <li>
                    <?php if ($pager->currentPage == 0) { ?>
                        <a disabled href="#" aria-label="Previous">
                            <span aria-hidden="true">上一页</span>
                        </a>
                    <?php } else { ?>
                        <a disabled href="<?= Yii::app()->createUrl('place', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
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

                    if ($page <= $num - $nums2) //当前页数小于或等于显示页码减去末尾项,当前位置还处于页码范围
                    {
                        $start = 1;
                        $end = $num;
                    } else {
                        $start = $page - $nums1;
                        $end = $page + $nums2;
                    }

                    /*当计算出来的末尾项大于总页数*/
                    if ($end > $total) {
                        $start = ($total - $num) + 1 > 0 ? ($total - $num) + 1 : 1; //开始项等于总页数减去要显示的数量然后再自身加1

                        $end = $total;
                    }
                    for ($i = $start;
                    $i <= $end;
                    $i++) {
                    ?>


                <li <?php echo $i == $page ? 'class="active"' : '' ?> ><a
                        href='<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
                </li>

                <?php } ?>
                <li>
                    <?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
                        <a href="#" aria-label="Next">
                            <span aria-hidden="true">下一页</span>
                        </a>
                    <?php } else { ?>
                        <a href="<?= Yii::app()->createUrl('place', array_merge($_GET, array('page' => ($pager->currentPage + 2)))) ?>" aria-label="Next">
                            <span aria-hidden="true">下一页</span>
                        </a>
                    <?php } ?>
                </li>
                <li>
                    <a href="<?php echo Yii::app()->createUrl('place', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
                </li>
                <li class="input">
                    <input class="form-control input-sm pull-left" type="text" value="">
                </li>
                <li class="button">
                    <button class="btn btn-default btn-sm" type="button">GO</button>
                </li>

            </ul>
        <?php } ?>
    </nav>
    <!--分页结束-->

</div>
<!--/.cp-tabpanel end-->

</div>
</main>

<!--图片滑过特效-->
<script defer="defer" src="<?php echo $this->_theme->baseUrl ?>/assets/js/modernizr.custom.js"></script>
<script defer="defer" src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.hoverdir.js"></script>
<script>
	$(function() {
		$('#cp-recom-thumbs > figure').each(function() {
			$(this).hoverdir();
		});
	});
</script>
<!--/.site-main end -->