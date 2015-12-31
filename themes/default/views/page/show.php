<!--/*==========================▼site-slides▼=========================*/-->
<figure class="site-slides" role="banner">
    <!--为了考虑小屏用户，将这里的img换为background-image, 以便居中显示-->
    <a href="<?php echo $this->createUrl('/lesson') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/1.jpg);"></a>
    <a href="<?php echo $this->createUrl('/host/default/myplace') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/2.jpg);"></a>
    <a href="<?php echo $this->createUrl('/master/default/mylesson') ?>" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/3.jpg);"></a>
    <a href="#" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/4.jpg);"></a>
    <a href="#" style="background-image: url(<?php echo $this->_theme->baseUrl ?>/assets/img/product/5.jpg);"></a>
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
				<?php if(Yii::app()->request->getParam('name') === 'contact'):?>
				<div class="contact-wrap">
					<div class="col-xs-offset-2 col-xs-9">
						<h4 class="text-danger text-right">
						   <?php
							$success = Yii::app()->user->getFlash('success');
							if($success != null){
								echo '<i class="fa fa-exclamation-circle"></i>'.$success;
							}?>
					   </h4>
					</div>
					<?php $form = $this->beginWidget('CActiveForm', array(
						'id' => 'contact-form',
						'htmlOptions' => array('class' => 'form-horizontal')
						)); ?>
						<div class="form-group">
							<div class="col-xs-6">
								<label class="sr-only" for="name"><span style="color:red">*</span>姓名</label>
								<?php echo $form->textField($contactModel, 'name', array('class' => 'form-control', 'placeholder' => '姓名')); ?>
								<p class="form-control-static">
                                    <?php echo $form->error($contactModel, 'name'); ?>
								</p>		
									
							</div>
							
							<div class="col-xs-6">
								<label class="sr-only" for="company">公司（选填）</label>
								<?php echo $form->textField($contactModel, 'company', array('class' => 'form-control', 'placeholder' => '公司（选填）')); ?>
								<p class="form-control-static">
                                    <?php echo $form->error($contactModel, 'company'); ?>
								</p>		
									
							</div>
						</div>

						<div class="form-group">
							<div class="col-xs-6">
								<label class="sr-only" for="cellphone"><span style="color:red">*</span>手机</label>
								<?php echo $form->textField($contactModel, 'cellphone', array('class' => 'form-control', 'placeholder' => '手机')); ?>
								<p class="form-control-static">
                                    <?php echo $form->error($contactModel, 'cellphone'); ?>
								</p>		
									
							</div>
							<div class="col-xs-6">
								<label class="sr-only" for="email"><span style="color:red">*</span>邮箱</label>
								<?php echo $form->textField($contactModel, 'email', array('class' => 'form-control', 'placeholder' => '邮箱')); ?>
								<p class="form-control-static">
                                    <?php echo $form->error($contactModel, 'email'); ?>
								</p>		
							</div>
						</div>
						
						<div class="form-group message-wrap">
							<div class="col-xs-12">
								<label class="sr-only" for="message"><span style="color:red">*</span>留言信息</label>
								<?php echo $form->textarea($contactModel, 'message', array('rows' => 9, 'class' => 'form-control', 'placeholder' => '留言信息')); ?>
								<p class="form-control-static">
                                    <?php echo $form->error($contactModel, 'message'); ?>
								</p>		
							</div>
						</div>
					
						<div class="form-group">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-block btn-lg btn-danger">
									确认提交
								</button>
							</div>
						</div>     
					<!--/.form-horizontal END-->    
	                	
                </div>
				<?php $this->endWidget(); ?>
				<?php endif; ?>
            </section>

        </article>
    </div>
</main>

<!--焦点图|亚洲字符竖排版扩展-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.slides.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/taketori.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/index.js"></script>
<!--/.site-main end -->