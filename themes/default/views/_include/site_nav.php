
<!--/*==========================▼site-category▼=========================*/-->
<nav class="site-category" role="navigation">
    <div class="container">
    	<h3 class="clear-m">
            <small>Category</small>
            <span>课程分类</span>
        </h3>
        <!--课程分类-->
        <ul class="list-unstyled clearfix col-xs-offset-1 text-center category" role="list">
                    <?php
					$catalogs = Catalog::getMenu();
                    ?>
                    <?php foreach ($catalogs as $catalog) { ?>
                        <li role="listitem">
                            <a href="<?php echo Yii::app() -> createUrl('lesson', array('cat' => $catalog -> id)); ?>"  title="<?php echo $catalog -> catalog_name; ?>"><?php echo $catalog -> catalog_name; ?></a>
                        </li>
                    <?php } ?>
        </ul>
        <!--/.category end-->
    </div>
</nav>
<!--/.site-category end -->
