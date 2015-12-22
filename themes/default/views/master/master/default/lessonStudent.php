<section class="admin-content pull-right match-item">

    <!--注意|H3有些小图标不一样-->
    <h3>
        <i class="fa fa-list-ul"></i>
        <a href="<?= Yii::app()->createUrl('lesson/view', array('id' => $lesson->id)) ?>"><?= $lesson->name ?></a>
        报名学员
    </h3>

    <div class="admin-top-bar admin-table admin-size-sm admin-table-list admin-class-list">
        <table class="table">
            <thead>
            <tr>
                <th>&nbsp;</th>
                <th>学员</th>
                <th>签到</th>
                <th>签到码</th>
                <th>二维码</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($students as $item): ?>
                <tr>
                    <td width="110"><img class="img-responsive" src="<?= $item['pic'] ?>" width="100"></td>

                    <td width="130"> <?= $item['name'] ?> </td>

                    <td width="120">
                        <a href="<?= Yii::app()->createUrl('master/default/is_arrival', array('student_id' => $item['id'], 'lesson_id' => $item['lesson_id'])) ?>">
                            <?= $item['is_arrival'] === '0' ? '未签到' : '已签到' ?>
                        </a>
                    </td>

                    <td width="140">
                        <a href="<?= Yii::app()->createUrl('master/default/change_qrcode', array('student_id' => $item['id'], 'lesson_id' => $item['lesson_id'])) ?>">
                            <?= $item['qrcode'] ?>
                        </a>
                    </td>

                    <td width="140">
                        <!--放图片就行--> <!--务必给图片加 class="img-responsive"-->
                        <i class="fa fa-qrcode fa-5x"></i>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <!--分页-->
        <nav class="text-center cp-pagination">
            <!--active为选中类-->
            <!--disabled为禁用属性-->
            <!--当前页属于首页或者末页时，应当为"上一页"和"下一页"添加disabled禁用属性-->
            <?php if ($pager->pageCount > 1 || true) { ?>
                <ul class="pagination pagination-sm">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => 1))) ?>">页首</a>
                    </li>
                    <li>
                        <?php if ($pager->currentPage == 0) { ?>
                            <a disabled href="#" aria-label="Previous"> <span aria-hidden="true">上一页</span> </a>
                        <?php } else { ?>
                            <a disabled href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $pager->currentPage))) ?>" aria-label="Previous">
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
                    <li <?= $i == $page ? 'class="active"' : '' ?>><a
                            href='<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $i))) ?>'><?php echo $i ?></a>
                    </li>
                    <?php } ?>

                    <li>
                        <?php if ($pager->currentPage >= $pager->pageCount - 1) { ?>
                            <a href="#" aria-label="Next"> <span aria-hidden="true">下一页</span> </a>
                        <?php } else { ?>
                            <a href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $pager->currentPage + 2))) ?>" aria-label="Next">
                                <span aria-hidden="true">下一页</span>
                            </a>
                        <?php } ?>
                    </li>

                    <li>
                        <a href="<?php echo Yii::app()->createUrl('master/default/mylesson', array_merge($_GET, array('page' => $pager->pageCount))) ?>">页尾</a>
                    </li>

                </ul>
            <?php } ?>
        </nav>

    </div>

</section>