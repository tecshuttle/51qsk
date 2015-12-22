
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
                        <?php $user = Teacher::Model()->findByPk($this->_user['masterId']); ?>
                        <img class="img-responsive" src="<?= $user->pic ?>">
                        <figcaption>
                            <span class="center-block"><?= $user->name ?></span>
                            <!--
                            <span class="center-block">修行等级：一级</span>
                            <span class="center-block">积分：<?= $user->popularity ?></span>
                            -->
                        </figcaption>
                    </figure>
                </header>
                <!--/.Admin-header END-->

                <nav class="admin-menu">
                    <!--active为选中类-->
                    <?php $status = $this->action->id; ?>

                    <a <?= ($status == "mylesson" OR $status == "addlesson") ? " class='active'" : "" ?>
                        href="<?= Yii::app()->createUrl('master/default/mylesson') ?>">
                        <i class="fa fa-desktop"></i>我的课程
                    </a>

                    <a <?= $status == "place" ? " class='active'" : "" ?>
                        href="<?= Yii::app()->createUrl('master/default/place') ?>">
                        <i class="fa fa-list-alt"></i>场地订单
                    </a>
                    <a <?= $status == "index" ? " class='active'" : "" ?>
                        href="<?= Yii::app()->createUrl('master/default/index') ?>">
                        <i class="fa fa-user"></i>个人信息
                    </a>
                    <a <?= $status == "mybooks" ? " class='active'" : "" ?>
                        href="<?= Yii::app()->createUrl('master/default/mybooks') ?>">
                        <i class="fa fa-book"></i>我的著作
                    </a>
                    <a <?= $status == "password" ? " class='active'" : "" ?>
                        href="<?= Yii::app()->createUrl('master/default/password') ?>">
                        <i class="fa fa-keyboard-o"></i>修改密码
                    </a>
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