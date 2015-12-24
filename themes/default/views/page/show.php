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

					<div class="contact-wrap">
                	
	                	<!--联系方式-->
	                	<dl class="dl-contact">
	                		<dt class="h3">
	                			<b>善种缘</b>
	                		</dt>
	                		<dd>这里是地址</dd>
	                		<dd>电话：0755-xxxxxx</dd>
	                		<dd>邮箱：xx@gmail.com</dd>
	                	</dl>
	                	
	                	<!--表单-->      
	                	<h4>您可以随时通过电话与邮件和我们保持联络，或把您的需求提交给我们</h4>    	
	                	<div class="form-horizontal">
		                			                	
		                		<div class="form-group">
		                			<div class="col-xs-6">
		    							<label class="sr-only" for="name">姓名</label>
		    							<input type="text" class="form-control" id="name" placeholder="姓名">
			    						<p class="form-control-static">
			    							<i class="fa fa-exclamation-circle"></i> 格式错误
			    						</p>		
		    								
		  							</div>
		  						
		  							<div class="col-xs-6">
		    							<label class="sr-only" for="company">公司（选填）</label>
		    							<input type="text" class="form-control" id="company" placeholder="公司（选填）">
		    							<p class="form-control-static">
			    							<i class="fa fa-exclamation-circle"></i> 格式错误
			    						</p>
		    						</div>			
		  						</div>
		
		                		<div class="form-group">
		                			<div class="col-xs-6">
		    							<label class="sr-only" for="cellphone-number">手机</label>
		    							<input type="text" class="form-control" id="cellphone-number" placeholder="手机">
			    						<p class="form-control-static">
				    							<i class="fa fa-exclamation-circle"></i> 格式错误
				    					</p>		
		  						</div>
		  						
		  						<div class="col-xs-6">
			    						<label class="sr-only" for="email">邮箱</label>
			    						<input type="text" class="form-control" id="email" placeholder="邮箱">
			    						<p class="form-control-static">
			    							<i class="fa fa-exclamation-circle"></i> 格式错误
			    						</p>
		    						</div>
		  						</div>
		  						
		                		<div class="form-group message-wrap">
		                			<div class="col-xs-12">	
			    						<label class="sr-only" for="message">留言信息</label>
			    						<textarea class="form-control" id="message" rows="9" placeholder="留言信息"></textarea>
			    						<p class="form-control-static">
			    							<i class="fa fa-exclamation-circle"></i> 格式错误
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
	                		
	                	</div>
	                	<!--/.form-horizontal END-->    
	                	
                	</div>	
                	<!--/.contact-wrap END-->    
                	         	
            </section>

        </article>
    </div>
</main>

<!--焦点图|亚洲字符竖排版扩展-->
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/jquery.slides.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/taketori.min.js"></script>
<script src="<?php echo $this->_theme->baseUrl ?>/assets/js/index.js"></script>
<!--/.site-main end -->