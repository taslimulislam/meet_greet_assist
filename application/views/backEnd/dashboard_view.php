<section class="content">
	<!-- Info boxes -->
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box" id="second-menu">
                <h4><i class="fa fa-list-alt" aria-hidden="true"></i> Website Part </h4>
                <div class="sidebar" style="height: auto;">
                    <ul class="sidebar-menu" data-widget="tree">

						            <!-- Gallery -->
						            <li class="treeview <?php if ($activeMenu === "gallery_add" || $activeMenu === "gallery_list" || $activeMenu === "gallery_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-image"></i> <span> <?php echo $this->lang->line("manage_gallery"); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "gallery_add") echo "active"; ?> "><a href="<?php echo base_url('admin/gallary/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("add_gallery"); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "gallery_list") echo "active"; ?> "><a href="<?php echo base_url('admin/gallary/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line("gallery_list"); ?> </a></li>
                            </ul>
                        </li>

                        <!-- Slider -->
                        <li class="treeview <?php if ($activeMenu === "slider") echo "active"; ?> ">
                            <a href="<?php echo base_url('admin/slider'); ?>">
                            <i class="fa fa-sliders"></i> <span> <?php echo $this->lang->line('slider'); ?> </span>
                            </a>
                        </li>

                        <!-- General Setting  -->
                        <li class="treeview <?php if ($activeMenu === "general_setting") echo "active"; ?> ">
                            <a href="<?php echo base_url('admin/general'); ?>">
                            <i class="fa fa-newspaper-o"></i> <span> <?php echo $this->lang->line('general'); ?> </span>
                            </a>
                        </li>

                        <!-- Testimonial -->
                        <li class="treeview <?php if ($activeMenu === "testimonials_add" || $activeMenu === "testimonials_list" || $activeMenu === "testimonials_edit") echo "active"; ?> ">
                            <a href="#">
                            <i class="fa fa-commenting"></i> <span> <?php echo $this->lang->line('manage_testimonial'); ?> </span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($activeMenu === "testimonials_add") echo "active"; ?> "><a href="<?php echo base_url('admin/testimonial/add'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('add_testimonial'); ?> </a></li>
                                <li class=" <?php if ($activeMenu === "testimonials_list") echo "active"; ?> "><a href="<?php echo base_url('admin/testimonial/list'); ?>"><i class="fa fa-circle-o"></i> <?php echo $this->lang->line('testimonial_list'); ?> </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

		
		<div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $main_service ?><sup style="font-size: 20px"></sup></h3>

              <p><?php echo $this->lang->line('main_service'); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-car"></i>
            </div> 
            <a href="<?php echo base_url('admin/main-service/list'); ?>" class="small-box-footer"><?php echo $this->lang->line('main_service_list'); ?> <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $main_service ?></h3>

              <p><?php echo $this->lang->line('main_service'); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $main_service ?></h3>

              <p><?php echo $this->lang->line('main_service'); ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-file-o"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<a href="<?php echo base_url('admin/division/list'); ?>">
				<div class="info-box">
					<span class="info-box-icon bg-yellow"><i class="fa  fa-university" aria-hidden="true"></i></span>
					
					<div class="info-box-content">
						<span class="info-box-text" style="color: black;">  <?php echo $this->lang->line('division'); ?></span>
						<span class="info-box-number" style="color: black;"> <?= $division; ?> </span>
					</div>
					
					<!-- /.info-box-content -->
				</div>
			</a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
			<a href="<?php echo base_url('admin/zilla/list'); ?>">
				<div class="info-box">
					<span class="info-box-icon bg-red"><i class="fa fa-square" aria-hidden="true"></i></span>
					<div class="info-box-content">
						<span class="info-box-text" style="color: black;"><?php echo $this->lang->line('zilla'); ?></span>
						<span class="info-box-number" style="color: black;">  <?= $zilla; ?>  </span> 
					</div>
					<!-- /.info-box-content -->
				</div>
			</a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only --> 
        <div class="col-md-3 col-sm-6 col-xs-12">
			<a href="<?php echo base_url('admin/upozilla/list'); ?>">
				<div class="info-box">
					<span class="info-box-icon bg-green"> <i class="fa fa-sitemap" aria-hidden="true"></i> </span>
					<div class="info-box-content">
						<span class="info-box-text" style="color: black;"><?php echo $this->lang->line('upozilla'); ?> </span>
						<span class="info-box-number" style="color: black;"> <?= $upozilla; ?> </span>
					</div>
					<!-- /.info-box-content -->
				</div>
			</a>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

</section>