
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('gallery_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/gallary/add') ?>" class="btn bg-red btn-sm"><i class="fa fa-plus"></i><?php echo $this->lang->line('add_gallery'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <?php if ($all_gallery): ?>
                    <?php foreach ($all_gallery as $key => $value): ?>
                    <div class="col-md-4">
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title" style="margin-right: 10%; height: 40px; overflow: hidden;"> 
                                    <a class="btn btn-sm" style="border: 1px solid white; padding: 0px 5px;" href="<?php echo base_url('admin/gallary/edit/'.$value->id) ?>"><i class="fa fa-edit"></i></a> 
                                    <a class="btn btn-sm" style="border: 1px solid #ffe100; padding: 0px 5px;" href="<?php echo base_url('admin/gallary/delete/'.$value->id) ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                                    <?php echo $value->title; ?>                                    
                                </h3>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php if ($value->type == 'Photo') {?>
                                <img class="img img-responsive" src="<?php echo base_url().$value->path; ?>" style="height: 305px;">
                                <?php }else if ($value->type == 'Video') { ?>
                                <iframe height="300px" src="https://www.youtube.com/embed/<?php echo $value->path; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <?php } ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <?php endforeach ?>
                    <?php endif ?>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>

