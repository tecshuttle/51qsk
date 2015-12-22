<!--/*==========================▼site-slides▼=========================*/-->
<figure class="site-slides" role="banner">
    <!--为了考虑小屏用户，将这里的img换为background-image, 以便居中显示-->
    <a href="<?php echo $this->createUrl('/lesson') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/index-03.jpg);"></a>
    <a href="<?php echo $this->createUrl('/host/default/myplace') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/index-01.jpg);"></a>
    <a href="<?php echo $this->createUrl('/master/default/mylesson') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/index-02.jpg);"></a>
    <a href="#" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/index-slides-01.jpg);"></a>
    <a href="#" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/index-slides-02.jpg);"></a>
</figure>
<!--/.site-banner end -->
<script language="javascript">  
             location.hash="#Anchor";  
</script>

<main class="site-main" role="main">
    <div class="container">
        <article class="admin-wrap clearfix match-height">

            <aside class="admin-aside pull-left match-item">
                <br/>
                <nav class="admin-menu">
                    <!--active为选中类-->
                    <a <?= $title_alias === "about" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'about')) ?>"id="Anchor">
                        了解我们
                    </a>

                    <a <?= $title_alias === "team" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'team')) ?>">
                        加入我们
                    </a>

                    <a <?= $title_alias === "contact" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'contact')) ?>">
                        联系我们
                    </a>

                    <a <?= $title_alias === "networkPolicy" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'networkPolicy')) ?>">
                        网络条款
                    </a>
					
                    <a <?= $title_alias === "help" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'help')) ?>" >
                        帮助中心
                    </a>
					
					<a <?= $title_alias === "unionCollege" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'unionCollege')) ?>" >
                        书院联盟
                    </a>

                    <!--<a <?= $title_alias === "law" ? " class='active'" : "" ?>
                        href="<?php echo $this->createUrl('/page/show', array('name' => 'law')) ?>">
                        法律声明
                    </a>-->
                </nav>
            </aside>

            <section class="admin-content pull-right match-item">
                <br/> <br/>
                <?php echo $bagecmsPage['content'] ?>
            </section>

        </article>
    </div>
</main>

<!--焦点图|亚洲字符竖排版扩展-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.slides.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/taketori.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/index.js"></script>
<!--/.site-main end -->