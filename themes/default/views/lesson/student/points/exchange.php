<section class="admin-content pull-right match-item">

    <!--注意|H3有些小图标不一样-->
    <h3><i class="fa fa-list-ul"></i>积分兑换</h3>

    <div class="md-teacher admin-top-bar admin-list">
        <!--此处的列表DOM和teacher.html的列表相同-->


        <?php foreach ($teacher_id as $teaid): ?>
            <!--列表-->
            <section class="list-teacher cp-media-sm cp-border-dotted">
                <figure class="media">
                    <div class="media-left">
                        <a href="teacher-detail.html">
                            <img class="media-object" src="assets/img/product/teacher.jpg">
                        </a>
                    </div>

                    <figcaption class="media-body">
                        <div class="row">
                            <div class="col-xs-9">
                                <h3 class="media-heading"><?php echo '导师id=' . $teaid->teacher_id; ?> </h3>

                                <span class="center-block good">擅长领域：茶道茶艺</span>

                                <ul class="list-inline">
                                    <li>从业经验：25年</li>
                                    <li>人气：2534</li>
                                </ul>

                            </div>
                            <div class="col-xs-3">
                                <a href="teacher-detail.html" class="btn btn-red btn-sm btn-sm-padding pull-right" title="了解更多" role="button">了解更多</a>

                            </div>

                        </div>

                        <p class="text-justify">主讲雅思阅读、BEC初级写作。一个偶然的机会使他赢得了人生中第一次来自于学生雷鸣般的掌声，那一刻他感受到了英雄 般的礼遇，从此便爱上了黑板前面的那片王土……
                        </p>
                    </figcaption>
                </figure>
            </section>
        <?php endforeach; ?>
        <!--/.list-teacher end-->



    </div>
    <!--/.Admin-list END-->

</section>
<!--/.Admin-content END-->

