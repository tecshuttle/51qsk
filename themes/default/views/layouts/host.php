<?php $this->beginContent('//layouts/main'); ?>

    <!--/*==========================▼site-main▼=========================*/-->
    <main class="site-main" role="main">
        <div class="container">
            <article class="admin-wrap clearfix match-height">

                <aside class="admin-aside pull-left match-item">
                    <header class="admin-header">
                        <figure>
                            <?php $user = Host::Model()->findByPk($this->_user['hostId']); ?>
                            <img class="img-responsive" src="<?= $user->pic ?>">
                            <figcaption>
                                <span class="center-block"><?= $user->name ?></span>
                            </figcaption>
                        </figure>
                    </header>

                    <nav class="admin-menu">
                        <!--active为选中类-->
                        <?php $status = $this->action->id; ?>
						<a <?= $status == "info" ? " class='active'" : "" ?>
                            href="<?= Yii::app()->createUrl('host/default/info') ?>">
                            <i class="fa fa-list-alt"></i>企业信息
                        </a>

                        <a <?= $status == "myplace" ? " class='active'" : "" ?>
                            href="<?= Yii::app()->createUrl('host/default/myplace') ?>">
                            <i class="fa fa-desktop"></i>我的场地
                        </a>

                        <a <?= $status == "password" ? " class='active'" : "" ?>
                            href="<?= Yii::app()->createUrl('host/default/password') ?>">
                            <i class="fa fa-user"></i>修改密码
                        </a>
                    </nav>
                </aside>

                <section class="admin-content pull-right match-item">
                    <?php echo $content; ?>
                </section>

            </article>
        </div>
    </main>

<?php $this->endContent(); ?>