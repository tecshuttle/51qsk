

						<section class="admin-content pull-right match-item">

							<!--注意|H3有些小图标不一样-->
							<h3><i class="fa fa-list-ul"></i>我的场地</h3>

							<div class="md-palce admin-top-bar admin-list">
                               <?php  foreach ($places as $place):?>
								<!--列表-->
								<section class="list-teacher cp-media-sm cp-border-dotted">
									<figure class="media">
										<div class="media-left">
											<a href="<?php echo $this->createUrl('/place/view', array('id' => $place->id))?>">
												<img class="media-object" src="assets/img/product/place.jpg">
											</a>
										</div>

										<figcaption class="media-body">

											<h3 class="media-heading"><?php echo $place->placename;?></h3>
											<span class="center-block"><?php echo $place->address;?></span>
											<span class="center-block"><?php echo $place->service;?></span>
											<ul class="list-inline">
												<li>面积：<?php echo $place->space;?>㎡</li>
												<li>可容纳：<?php echo $place->people;?>人</li>
											</ul>

										</figcaption>
									</figure>
								</section>
								<?php endforeach; ?>
								<!--/.list-place end-->

					

							

								<!--增加场地-->

								<footer class="text-center add-dom">
									<a class="btn btn-red btn-normer btn-lg-padding" href="/index.php?r=host/default/addplace" role="button">
										<i class="fa fa-plus"></i>增加场地
									</a>
								</footer>

							</div>
							<!--/.Admin-list END-->

						</section>
						<!--/.Admin-content END-->

					</article>
					<!--/.Admin-wrap END-->
				</div>
			</main>
			<!--/.site-main end -->
