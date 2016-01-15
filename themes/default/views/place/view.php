<!--/*==========================▼site-main▼=========================*/-->
<main class="site-main md-place-detail" role="main">
    <div class="container">

        <header class="cp-detail-header">
            <figure class="media cp-media-lager">
                <div class="media-left">
                    <img class="media-object" src="<?php echo $place->pic_adr; ?>">
                </div>

                <figcaption class="media-body">
                    <h3 class="media-heading"><?php echo $place->name; ?>

                    </h3>

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


                    <h5>场地简介:</h5>

                    <p class="text-justify">
                        <?php echo $place->summary; ?>
                    </p>

                    <span class="center-block area">面积：<?php echo $place->space; ?>
                        ㎡&nbsp;(&nbsp;可容纳<?php echo $place->people; ?>人&nbsp;)</span>


                </figcaption>


            </figure>
        </header>

        <!--/.md-subject-detail-header END-->

        <div class="cp-tabpanel cp-tabpanel-detail" role="tabpanel">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="detailTab">
                <li role="presentation" class="active">
                    <a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab">会所详情</a>
                </li>
                <li role="presentation"><a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">预约空挡</a>
                </li>
            </ul>

            <!-- Tab panes -->

            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="tab1" style="min-height: 600px;">
                    <?php echo $place->intro; ?>
                </div>

                <div role="tabpanel" class="tab-pane fade in" id="tab2">

                    <div class="md-date-table">
                        <figure>
                            <!--这里是插件-->
                            <h4 class="text-warning">
                                <i class="fa fa-exclamation-circle"></i>&nbsp;不可预约为日期失效或已有约
                            </h4>

                            <div id="custom-date-format" class="cp-date-format"></div>

                            <figcaption class="text-center confirm-info-btn">

                                <!--弹出层在main底部-->
                                <a data-toggle="modal" href="#myModal" class="btn btn-red btn-lg btn-lg-padding" title="确定提交" role="button" id="submit_date">确认提交</a>
                            </figcaption>
                        </figure>
                    </div>
                    <!--/.日期表格 END-->

                </div>

            </div>


        </div>
        <!--/.cp-tabpanel end-->

    </div>
</main>


<!--模态框-->
<div id="myModal" class="modal fade cp-modal" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="400" style="display: none;">
    <header class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title text-center"><?= $this->_cookiesGet('userName'); ?>，您好</h4>

        <div id="message"></div>

    </header>
    <!--/.Modal-header END-->
    <div class="modal-body">

        <form class="form-horizontal">
            <!--
            <div class="form-group">
                <label class="col-sm-3 control-label">预定用途：</label>
                <div class="col-sm-9">

                    <!--单选
                    <div class="cp-radio-group clearfix" data-toggle="buttons">
                        <!--active类为样式激活类
                        <label class="radio-inline btn btn-block btn-white btn-sm btn-sm-padding pull-left active">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="课程" autocomplete="off" checked> 课程
                        </label>
                        <label class="radio-inline btn btn-block btn-white btn-sm btn-sm-padding pull-right">
                            <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="活动" autocomplete="off"> 活动
                        </label>
                    </div>
                    <!--/.cp-radio-group END

                </div>
            </div>

            <!--
            <div class="form-group">
                <label for="textareaRequirements" class="col-sm-3 control-label">其他要求：</label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="5" id="textareaRequirements"></textarea>
                </div>
            </div>
            -->

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" class="btn btn-red btn-lg btn-lg-padding" id="submit_reservation">确认预定
                    </button>
                </div>
            </div>

        </form>

    </div>
    <!--/.Modal-body END-->

</div>
<!--/.Modal END-->


<!--模态弹出层扩展-->
<script src="//cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-modalmanager.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-modal.min.js"></script>

<!--jquery-ui.js-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery-ui.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/datepicker-zh-CN.js"></script>

<!--参数配置见官网-->
<!--http://multidatespickr.sourceforge.net/-->
<link rel="stylesheet" type="text/css" href="<?php echo $this->_theme->baseUrl ?>/assets/css/jquery-ui-custom.min.css" media="screen">
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery-ui.multidatespicker.min.js"></script>

<!--multidatespicker-set-->
<script>
    var dates = new Array();
    var out_of_dates = <?=((empty($place->out_of_dates) || $place->out_of_dates === 'null') ? '[]':$place->out_of_dates)?>;
    out_of_dates.push(new Date()); //当天不可预约

    $(function () {
        var today = new Date();

        $('#custom-date-format').multiDatesPicker({
            /*addDisabledDates: [<?php
								$places = PlaceBooking::Model()->findAllByAttributes(array('place_id'=>$place->id, 'status'=>1));
								$dates = CHtml::listData($places, "id" ,"date");
								array_push($dates, date('Y-m-d'));
								foreach ($dates as $date){
									echo "new Date('{$date}'),";
								}
								?>],*/ //设置不能不能预约的日期
            addDisabledDates: out_of_dates,
            minDate: 0, //设置最小日期
            //addDates: out_of_dates,
            //maxDate: 30 | 设置最大日期
            adjustRangeToDisabled: true
        });
        <?php if ($this->_cookiesGet('userType') != 'master'){?>
        //导师未登录，提示登录
        $("#submit_date").attr("href", "<?=$this->createUrl('/login', array('userType' => 'master' ));?>");
        $("#submit_date").text("导师登录");
        <?php }else {?>

        $("#submit_date").click(function () {
            var dates = $('#custom-date-format').multiDatesPicker('getDates');
            for (var key in dates) {
                $("#message").append('<h5 class="modal-content text-center">' + dates[key] + '</h5>');
            }

        });
        <?php }?>
        $("#submit_reservation").click(function () {
            $.ajax({
                type: "GET", //访问WebService使用Post方式请求
                contentType: "application/json",
                url: "<?=$this->createUrl('master/default/bookPlace');?>", //调用WebService的地址和方法名称组合 ---- WsURL/方法名
                data: { 'dates': $('#custom-date-format').multiDatesPicker('getDates'), 'place_id': <?=$place->id?>}, //这里是要传递的参数，格式为 data: "{paraName:paraValue}",下面将会看到
                dataType: 'json', //WebService 会返回Json类型
                success: function (result) {
                    if (result.status == 'success') {
                        window.location.href = '<?=$this->createUrl('place/pay&id='.$place->id);?>';
                    }
                    //回调函数，result，返回值
                }
            });

        });
    });
</script>
<!--/.site-main end -->
