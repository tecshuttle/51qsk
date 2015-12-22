<?php
$this->beginContent('//layouts/main');
?>

<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main" role="main">
    <div class="container">
        <article class="admin-wrap clearfix match-height">

            <aside class="admin-aside pull-left match-item">
                <header class="admin-header">
                    <figure>
                        <?php $user = Student::Model()->findByPk($this->_user['studentId']); ?>
                        <img class="img-responsive" src="<?= $user->pic ?>">
                        <figcaption>
                            <span class="center-block"><?= $user->name ?></span>
                            <!--
                            <span class="center-block">修行等级：一级</span>
                            <span class="center-block">积分：<?= $user->point ?>分</span>
                            -->
                        </figcaption>
                    </figure>
                </header>
                <!--/.Admin-header END-->

                <nav class="admin-menu">
                    <!--active为选中类-->
                    <?php $status = $this->action->id;?>
                    
                     <a <?= $status == "list" || $status == "collectionLesson" || $status == "expiredLesson"? " class='active'" : ""  ?>
                        href="<?= Yii::app()->createUrl('student/lesson/list') ?>">
                        <i class="fa fa-desktop"></i>我的课程
                    </a>
                    <a <?= $status == "index" ? " class='active'" : ""  ?>
                        href="<?= Yii::app()->createUrl('student/teacher/index') ?>">
                        <i class="fa fa-heart"></i>关注导师
                    </a>
                    <a <?= $status == "sinfo" ? " class='active'" : ""  ?>
                        href="<?= Yii::app()->createUrl('student/info/sinfo') ?>">
                        <i class="fa fa-user"></i>个人信息
                    </a>
                    <a <?= $status == "pawd" ? " class='active'" : ""  ?>
                        href="<?= Yii::app()->createUrl('student/password/pawd') ?>">
                        <i class="fa fa-keyboard-o"></i>修改密码
                    </a>
                    <!--
                    <a <?= $status == "exchange" ? " class='active'" : ""  ?>
                        href="<?= Yii::app()->createUrl('student/points/exchange') ?>">
                        <i class="fa fa-star"></i>积分兑换
                    </a>
                    <a <?= $status == "mycoupon" ? " class='active'" : ""  ?>
                        href="<?= Yii::app()->createUrl('student/coupon/mycoupon') ?>">
                        <span class="fa-stack">
                            <i class="fa fa-ticket fa-stack-2x"></i>
                            <i class="fa fa-yen fa-stack-1x"></i>
                        </span>我的优惠券
                    </a>
                    -->
                </nav>
                <!--/.Admin-menu END-->

            </aside>
            <!--/.Admin-aside END-->

            <section class="admin-content pull-right match-item">
                <?php echo $content; ?>
            </section>
            <!--/.Admin-content END-->

        </article>
        <!--/.Admin-wrap END-->
    </div>
</main>
<!--/.site-main end -->

<?php $this->endContent(); ?>