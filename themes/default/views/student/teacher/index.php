<section class="admin-content pull-right match-item">

    <h3><i class="fa fa-list-ul"></i>关注导师</h3>

    <div class="md-teacher admin-top-bar admin-list">

        <?php foreach ($teachers as $teacher): ?>
            <section class="list-teacher cp-media-sm cp-border-dotted">
                <figure class="media">
                    <div class="media-left">
                        <a href="<?= Yii::app()->createUrl('teacher/view', array('id' => $teacher['id'])); ?>">
                            <img class="media-object" src="<?= $teacher['pic'] ?>">
                        </a>
                    </div>

                    <figcaption class="media-body">
                        <div class="row">
                            <div class="col-xs-9">
                                <h3 class="media-heading"><?= $teacher['name'] ?></h3>

                                <span class="center-block good">擅长领域：<?= $teacher['catalog_name'] ?></span>

                                <ul class="list-inline">
                                    <li>从业经验：<?= $teacher['experience'] ?>年</li>
                                    <li>人气：<?= $teacher['popularity'] ?></li>
                                </ul>

                            </div>
                            <div class="col-xs-3">
                                <a href="<?= Yii::app()->createUrl('teacher/view', array('id' => $teacher['id'])); ?>" class="btn btn-red btn-sm btn-sm-padding pull-right" title="了解更多" role="button">
                                    了解更多
                                </a>

                                <br/> <br/>

                                <a href="<?= Yii::app()->createUrl('student/teacher/delete', array('id' => $teacher['id'])); ?>" class="btn btn-red btn-sm btn-sm-padding pull-right" role="button">
                                    取消关注
                                </a>
                            </div>

                        </div>

                        <p class="text-justify"><?= $teacher['profile'] ?> </p>
                    </figcaption>
                </figure>
            </section>
        <?php endforeach; ?>
    </div>

</section>