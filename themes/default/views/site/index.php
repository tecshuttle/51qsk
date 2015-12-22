
<!--/*==========================▼site-slides▼=========================*/-->
<figure class="site-slides" role="banner">
    <a href="<?php echo $this->createUrl('/lesson') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/1.jpg);"></a>
    <a href="<?php echo $this->createUrl('/host/default/myplace') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/2.jpg);"></a>
    <a href="<?php echo $this->createUrl('/master/default/mylesson') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/3.jpg);"></a>
    <a href="#" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/4.jpg);"></a>
    <a href="#" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/5.jpg);"></a>
</figure>
<!--/.site-banner end -->

<?php $this->renderPartial('/_include/site_nav') ?>
<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main" role="main">
    <div class="container">

        <figure class="section-index index-banner">
            <img src="<?php echo $this->_theme->baseUrl ?>/assets/img/product/index-banner.jpg">
        </figure>

        <!--最新课程-->
        <section class="section-index section-one">
            <div class="row match-height">
                <div class="col-xs-1 match-item">
                    <h3 class="clear-m">
                        <small>progranmme</small>
                        <span>最新课程</span>
                    </h3>
                    <a class="text-center cp-more" href="<?php echo $this->createUrl('/lesson') ?>" title="更多">
                        更多
                        <span class="glyphicon glyphicon-menu-down"></span>
                    </a>
                </div>
                <div class="col-xs-11 match-item">

                    <div class="inner cp-picture-effect">

                        <div class="media">
                            <div class="media-left">
                                <a href="<?php echo $this->createUrl('/lesson/view', array('id' => $lesson->id)) ?>">
                                    <img class="media-object" src="<?php echo $lesson -> pic; ?>">
                                </a>
                            </div>
                            <div class="media-body">
                                <a class="media-heading" href="<?php echo $this->createUrl('/lesson/view', array('id' => $lesson->id)) ?>" title="东方禅意美学之茶道">
                                    <h4 class="clear-m"><?php echo $lesson -> name; ?></h4>
                                </a>

                                <span><?php echo $lesson -> price; ?></span>
                                <p>
                                    <b>课程介绍：</b>“<?php echo $lesson -> summary; ?>&nbsp;...
                                </p>

                            </div>
                        </div>

                        <ul class="list-unstyled clearfix">
                            <?php foreach ($pic as $pic): ?>
                                <li>
                                    <a href="<?php echo $this->createUrl('/lesson/view', array('id' => $pic->id)) ?>">
                                        <img src="<?php echo $pic -> pic; ?>">
                                    </a>
                                </li>
                            <?php endforeach ?>

                        </ul>

                    </div>
                </div>
            </div>

        </section>

        <hr>

        <!--导师风采-->
        <section class="section-index section-two">
            <div class="row match-height">
                <div class="col-xs-1 match-item">
                    <h3 class="clear-m">
                        <small>supervisor</small>
                        <span>导师风采</span>
                    </h3>
                    <a class="text-center cp-more" href="<?php echo $this->createUrl('/teacher') ?>" title="更多">
                        更多
                        <span class="glyphicon glyphicon-menu-down"></span>
                    </a>
                </div>
                <div class="col-xs-11 match-item">
                    <div class="inner">

                        <ul class="list-unstyled clearfix">

                            <?php foreach ($teacher as $teacher): ?>
                                <li>
                                    <a class="cp-flip" href="<?php echo $this->createUrl('/teacher/view', array('id' => $teacher->id)) ?>">
                                        <figure class="cp-flipper">

                                            <span class="center-block cp-before">
                                                <!--翻转之前的图片-->
                                                <img class="img-responsive" src="<?php echo $teacher -> pic; ?>">
                                            </span>

                                            <figcaption class="cp-after">
                                                <!--翻转之后的内容-->
                                                <div class="teacher-info">
                                                	<b class="center-block text-center teacher-name"><?php echo $teacher -> name; ?></b>
                                                    <span class="center-block text-justify teacher-profile"><?php echo $teacher -> profile; ?></span>

                                                </div>

                                            </figcaption>

                                        </figure>
                                    </a>
                                </li>
                            <?php endforeach; ?>

                        </ul>

                    </div>
                </div>
            </div>
        </section>

        <!--禅意会所-->
        <section class="section-index section-three">
            <div class="row match-height">
                <div class="col-xs-1 match-item">
                    <h3 class="clear-m">
                        <small>zen&nbsp;club</small>
                        <span>禅意会所</span>
                    </h3>
                    <a class="text-center cp-more" href="<?php echo $this->createUrl('/place') ?>" title="更多">
                        更多
                        <span class="glyphicon glyphicon-menu-down"></span>
                    </a>
                </div>
                <div class="col-xs-3 match-item">

                    <div class="description clearfix">
                        <h4 class="text-center clear-m pull-right">场地租用</h4>
                        <p class="pull-left vertical-rl">
                            书院栏目针对于需要场地的导师，
                            <br> 机构，个人提供联系场地，确保日期行程的服务。
                        </p>

                    </div>

                </div>
                <div class="col-xs-8 match-item">

                    <div class="cp-effect-grid">
                        <?php foreach ($place as $place): ?>
                            <figure class="effect-item">

                                <img class="img-responsive" src="<?php echo $place -> pic; ?>">

                                <figcaption>
                                    <h4><?php echo $place -> name; ?></h4>
                                    <p><i class="fa fa-map-marker"></i>地点：<?php echo $place -> cityArea -> name; ?></p>
                                    <p><i class="fa fa-users"></i>人数：<?php echo $place -> people; ?>人</p>
                                    <a href="<?php echo $this->createUrl('/place/view', array('id' => $place->id)) ?>">Go</a>
                                </figcaption>
                            </figure>
                        <?php endforeach; ?>


                    </div>

                </div>
            </div>
        </section>

    </div>
</main>

<!--焦点图|亚洲字符竖排版扩展-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.slides.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/taketori.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/index.js"></script>
<!--/.site-main end -->