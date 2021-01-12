<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('airmail_registration_edit'); ?>  </h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url() ?>admin/airmail-service-registration/list" class="btn bg-green btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('airmail_registration_list'); ?>  </a>
                    </div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <form action="<?php echo base_url("admin/airmail-service-registration/edit/".$edit_info->id);?>" method="post" enctype="multipart/form-data" class="form-horizontal"> 
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
                                            <label><?php echo $this->lang->line('airmail_type'); ?> *</label>
                                            <select class="form-control select2" name="service_type_id" required="" >
                                                <?php foreach ($airmail_type_list as $value): ?>
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
                                            <label><?php echo $this->lang->line('airmail_station'); ?> *</label>
                                            <select class="form-control select2" name="service_station_id" required="" >
                                                <?php foreach ($airmail_station_list as $value): ?>
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
                                            <input name="train_or_flight" placeholder="<?php echo $this->lang->line('train_or_flight'); ?> " class="form-control inner_shadow_red" required="" type="text" value="<?php echo $edit_info->train_or_flight_no; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('received_from') ?> *</label>
                                            <input name="received_from" placeholder="<?php echo $this->lang->line('received_from'); ?> " class="form-control inner_shadow_red" required="" type="text" value="<?php echo $edit_info->received_from; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('drop_to') ?> *</label>
                                            <input name="drop_to" placeholder="<?php echo $this->lang->line('drop_to'); ?> " class="form-control inner_shadow_red"  required="" type="text" value="<?php echo $edit_info->drop_to; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('received_date') ?> *</label>
                                            <input name="received_date" placeholder="<?php echo $this->lang->line('received_date'); ?> " class="form-control inner_shadow_red date" required="" autocomplete="off" type="text" value="<?php echo date("d M, Y ", strtotime($edit_info->received_date)) ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12 ">
                                            <label><?php echo $this->lang->line('product_details'); ?> *</label>
                                            <textarea required rows="2"  name="product_details" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('product_details'); ?>"  ><?php echo $edit_info->product_details; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12 ">
                                            <label><?php echo $this->lang->line('delivery_details'); ?> *</label>
                                            <textarea required rows="2"  name="delivery_details" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('delivery_details'); ?>"  > <?php echo $edit_info->delivery_details; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-sm-12 ">
                                            <label><?php echo $this->lang->line('remark'); ?> *</label>
                                            <textarea required rows="2"  name="remark" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('remark'); ?>"  ><?php echo $edit_info->remark; ?></textarea>
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



