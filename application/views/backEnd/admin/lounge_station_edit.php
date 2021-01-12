<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('lounge_station_edit'); ?>  </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/lounge-service-station/list" class="btn bg-green btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('lounge_station_list'); ?>  </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/lounge-service-station/edit/".$edit_info->id);?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('lounge_service_type'); ?> *</label>
                                            <select class="form-control select2" name="lounge_service_type_id" required="" >
                                                <?php foreach ($lounge_type_list as $value): ?>
                                                <option value="<?php echo $value->id; ?>"
                                                    <?php if ($value->id == $edit_info->lounge_service_type_id): ?>
                                                    selected
                                                    <?php endif ?>
                                                    ><?php echo $value->name ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('name'); ?> *</label>
                                            <input name="name" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_red" required="" type="text" value="<?php echo $edit_info->name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('priority'); ?></label><small style="color: gray"><?php echo $this->lang->line('sorting_will_be_min_to_max'); ?></small>
                                            <input name="priority" placeholder="<?php echo $this->lang->line('priority'); ?>" class="form-control inner_shadow_red" type="number" value="<?php echo $edit_info->priority; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('unit_rate'); ?> *</label>
                                            <input name="unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_red" required="" type="number" value="<?php echo $edit_info->unit_rate; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <center>
                                    <button type="reset" class="btn btn-sm btn-danger"><?php echo $this->lang->line('cancel'); ?></button>
                                    <button type="submit" class="btn btn-sm bg-green"><?php echo $this->lang->line('update'); ?></button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
</section>
