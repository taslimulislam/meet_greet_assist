<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-teal box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('service_registration_edit'); ?>  </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>agent/mga-service-registration/list" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('service_registration_list'); ?>  </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("agent/mga-service-registration/edit/".$edit_info->id);?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
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
                                            <label><?php echo $this->lang->line('service_type'); ?> *</label>
                                            <select class="form-control select2" name="service_type_id" required="" >
                                                <?php foreach ($service_type_list as $value): ?>
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
                                            <label><?php echo $this->lang->line('service_station'); ?> *</label>
                                            <select class="form-control select2" name="service_station_id" required="" >
                                                <?php foreach ($service_station_list as $value): ?>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('train_or_flight'); ?> *</label>
                                            <input name="train_or_flight" placeholder="<?php echo $this->lang->line('train_or_flight'); ?> " class="form-control inner_shadow_teal" required="" type="text" value="<?php echo $edit_info->train_or_flight_no; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('start_time'); ?> *</label>
                                            <input name="start_time" placeholder="<?php echo $this->lang->line('start_time'); ?> " class="form-control inner_shadow_teal timepicker" required="" type="text" value="<?php echo date("h:i a", strtotime($edit_info->start_time)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 bootstrap-timepicker">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('landing_time'); ?> *</label>
                                            <input name="landing_time" placeholder="<?php echo $this->lang->line('landing_time'); ?> " class="form-control inner_shadow_teal timepicker" required="" type="text" value="<?php echo date("h:i a", strtotime($edit_info->landing_time)); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('journy_date'); ?> *</label>
                                            <input name="journey_date" placeholder="<?php echo $this->lang->line('journy_date'); ?> " class="form-control inner_shadow_teal date" required="" type="text" value="<?php echo date("d M, Y ", strtotime($edit_info->journey_date)); ?>">
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
                                    <button type="submit" class="btn btn-sm bg-teal"><?php echo $this->lang->line('update'); ?></button>
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



