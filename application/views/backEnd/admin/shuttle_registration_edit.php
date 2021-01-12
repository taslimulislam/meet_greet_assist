<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('shuttle_registration_edit'); ?>  </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/shuttle-service-registration/list" class="btn bg-red btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('shuttle_registration_list'); ?>  </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/shuttle-service-registration/edit/".$edit_info->id);?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('client_name'); ?> *</label>
                                            <select class="form-control select2" name="client_id" required="" >
                                                <?php foreach ($client_list as $value): ?>
                                                <option value="<?php echo $value->id; ?>"
                                                    <?php if ($value->id == $edit_info->client_id): ?>
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
                                            <label><?php echo $this->lang->line('shuttle_type'); ?> *</label>
                                            <select class="form-control select2" name="service_type_id" required="" >
                                                <?php foreach ($shuttle_type_list as $value): ?>
                                                <option value="<?php echo $value->id; ?>"
                                                    <?php if ($value->id == $edit_info->service_type_id): ?>
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
                                            <label><?php echo $this->lang->line('shuttle_station'); ?> *</label>
                                            <select class="form-control select2" name="service_station_id" required="" >
                                                <?php foreach ($shuttle_station_list as $value): ?>
                                                <option value="<?php echo $value->id; ?>"
                                                    <?php if ($value->id == $edit_info->service_station_id): ?>
                                                    selected
                                                    <?php endif ?>
                                                    ><?php echo $value->name ?>
                                                </option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('start_from'); ?> *</label>
                                            <input name="start_from" placeholder="<?php echo $this->lang->line('start_from'); ?> " class="form-control inner_shadow_green timepicker" required="" type="text" value="<?php echo date("h:i a", strtotime($edit_info->start_from)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('end_to'); ?> *</label>
                                            <input name="end_to" placeholder="<?php echo $this->lang->line('end_to'); ?> " class="form-control inner_shadow_green timepicker" required="" type="text" value="<?php echo date("h:i a", strtotime($edit_info->end_to)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('travel_date'); ?> *</label>
                                            <input name="travel_date" placeholder="<?php echo $this->lang->line('travel_date'); ?> " class="form-control inner_shadow_green date" required="" type="text" value="<?php echo date("d M, Y ", strtotime($edit_info->travel_date)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('status'); ?> *</label>
                                            <br>
                                            <select name="status" required="" class="select2 form-control">

                                                <option  value="1" <?php if ($edit_info->approve_status == '1') echo 'selected'; ?> > Yes </option>
                                                <option  value="0" <?php if ($edit_info->approve_status == '0') echo 'selected'; ?> > No </option>

                                            </select>
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


<script>
     $(function(){
        $('.timepicker').timepicker({
            showInputs: false
        });
    });   
</script>

<script>
    $(function(){
    
     $('.date').datepicker({
            autoclose: true,
            changeYear:true,
            changeMonth:true,
            dateFormat: "dd-mm-yy",
            yearRange: "-10:+10"
        });
     
    });
    
    CKEDITOR.replace( 'body' );
                
</script>



