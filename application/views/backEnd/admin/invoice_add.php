<section class="content">
    <div class="row">
        <form action="<?php echo base_url('admin/invoice/add/') ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $this->lang->line('invoice_add'); ?> </h3>
                    </div>
                    <div class="box-body">
                        <div class="row" style="box-shadow: 0px 0px 10px 0px #3c8dbc;margin: 10px 30px 40px 25px;padding: 30px 0px 30px 0px;">
                            <center style="margin-top: 0px;margin-bottom: 15px;">
                                <span style="border-bottom: 2px solid #a8c8c8;text-align: center;font-size: 20px;color: teal;">Client Information</span>
                            </center>
                            <div class="col-md-12">
                                <input type="hidden" name="client_id" value="0">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('phone') ?> *</label>
                                            <input name="phone" autocomplete="off" placeholder="<?php echo $this->lang->line('phone'); ?> " class="form-control inner_shadow_primary" required="" pattern="[0]{1}[1]{1}[3|4|5|6|7|8|9]{1}[0-9]{8}" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('name') ?> *</label>
                                            <input name="name" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_primary" required="" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('email') ?> *</label>
                                            <input name="email" placeholder="<?php echo $this->lang->line('email'); ?> " class="form-control inner_shadow_primary" required="" type="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('pasport') ?> *</label>
                                            <input name="passport_number" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_primary" required="" type="text">
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-9">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">MGA</a></li>
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">LOUNGE</a></li>
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">SHUTTLE</a></li>
                                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true">AIRMAIL</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('service_type'); ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="service_type_id" id="service_type_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_service_type'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('service_station') ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="service_station_id" id="mga_service_station_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_service_station'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('start_time') ?> *</label>
                                                            <input name="start_time" placeholder="<?php echo $this->lang->line('start_time'); ?> " class="form-control inner_shadow_teal timepicker" autocomplete="off" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('landing_time') ?> *</label>
                                                            <input name="landing_time" placeholder="<?php echo $this->lang->line('landing_time'); ?> " class="form-control inner_shadow_teal timepicker" autocomplete="off" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('journy_date') ?> *</label>
                                                            <input name="journey_date" placeholder="<?php echo $this->lang->line('journy_date'); ?> " class="form-control inner_shadow_teal date" required="" autocomplete="off" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('train_or_flight') ?> *</label>
                                                            <input name="train_or_flight" placeholder="<?php echo $this->lang->line('train_or_flight'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('person') ?> *</label>
                                                            <input name="mga_person" id="mga_person" value="1" placeholder="<?php echo $this->lang->line('person'); ?> " class="form-control inner_shadow_teal" required="" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('unit_rate') ?> *</label>
                                                            <input name="mga_unit_rate" id="mga_unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('total_bill') ?> *</label>
                                                            <input name="mga_total_bill" id="mga_total_bill" placeholder="<?php echo $this->lang->line('total_bill'); ?> " class="form-control inner_shadow_teal" required="" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('lounge_type'); ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="lounge_service_type_id" id="lounge_service_type_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_lounge_type'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('lounge_station') ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="lounge_service_station_id" id="lounge_service_station_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_lounge_station'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('start_time') ?> *</label>
                                                            <input name="service_start_time" placeholder="<?php echo $this->lang->line('start_time'); ?> " class="form-control inner_shadow_teal timepicker" autocomplete="off" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('landing_time') ?> *</label>
                                                            <input name="landing_time" placeholder="<?php echo $this->lang->line('landing_time'); ?> " class="form-control inner_shadow_teal timepicker" autocomplete="off" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('journy_date') ?> *</label>
                                                            <input name="journey_date" placeholder="<?php echo $this->lang->line('journy_date'); ?> " class="form-control inner_shadow_teal date" required="" autocomplete="off" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('reserved_hour'); ?> *</label>
                                                            <div class="col-sm-12">
                                                                <div class="col-md-6">
                                                                    <select name="hour" class="select2 form-control inner_shadow_teal" required="" id="">
                                                                        <option value="" selected><?php echo $this->lang->line('select_hour'); ?></option>
                                                                        <option value="0">00</option>
                                                                        <option value="3600">01</option>
                                                                        <option value="7200">02</option>
                                                                        <option value="10800">03</option>
                                                                        <option value="14400">04</option>
                                                                        <option value="18000">05</option>
                                                                        <option value="21600">06</option>
                                                                    </select>
                                                                </div>  
                                                                <div class="col-md-6">
                                                                    <select name="minuts" class="select2 form-control inner_shadow_teal" required="" id="">
                                                                        <option value="0" selected><?php echo $this->lang->line('select_minutes'); ?></option>
                                                                        <option value="0">00</option>
                                                                        <option value="900">15</option>
                                                                        <option value="1800">30</option>
                                                                        <option value="2700">45</option>
                                                                    </select>
                                                                </div>  
                                                            </div>                                     
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('train_or_flight') ?> *</label>
                                                            <input name="train_or_flight" id="train_or_flight" placeholder="<?php echo $this->lang->line('train_or_flight'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('person') ?> *</label>
                                                            <input name="lounge_person" id="lounge_person" value="1" placeholder="<?php echo $this->lang->line('person'); ?> " class="form-control inner_shadow_teal" required="" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('unit_rate') ?> *</label>
                                                            <input name="lounge_unit_rate" id="lounge_unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_teal" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('total_bill') ?> *</label>
                                                            <input name="lounge_total_bill" id="lounge_total_bill" placeholder="<?php echo $this->lang->line('total_bill'); ?> " class="form-control inner_shadow_teal" required="" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                                        <div class="row">
                                            <div class="col-md-12"> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('shuttle_type'); ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="shuttle_service_type_id" id="shuttle_service_type_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_shuttle_type'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('shuttle_station') ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="shuttle_service_station_id" id="shuttle_service_station_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_shuttle_station'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('start_from') ?> *</label>
                                                            <input name="start_from" placeholder="<?php echo $this->lang->line('start_from'); ?> " class="form-control inner_shadow_green timepicker" autocomplete="off" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 bootstrap-timepicker">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('end_to') ?> *</label>
                                                            <input name="end_to" placeholder="<?php echo $this->lang->line('end_to'); ?> " class="form-control inner_shadow_green timepicker" autocomplete="off" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('travel_date') ?> *</label>
                                                            <input name="travel_date" placeholder="<?php echo $this->lang->line('travel_date'); ?> " class="form-control inner_shadow_green date" required="" autocomplete="off" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('person') ?> *</label>
                                                            <input name="shuttle_person" id="shuttle_person" value="1" placeholder="<?php echo $this->lang->line('person'); ?> " class="form-control inner_shadow_green" required="" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('unit_rate') ?> *</label>
                                                            <input name="shuttle_unit_rate" id="shuttle_unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_green" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('total_bill') ?> *</label>
                                                            <input name="shuttle_total_bill" id="shuttle_total_bill" placeholder="<?php echo $this->lang->line('total_bill'); ?> " class="form-control inner_shadow_green" required="" type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_4">
                                        <div class="row">
                                            <div class=""> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('airmail_type'); ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="airmail_service_type_id" id="airmail_service_type_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_airmail_type'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('airmail_station') ?> *</label>
                                                            <select style="width: 100%;" class="form-control select2" name="airmail_service_station_id" id="airmail_service_station_id" required >
                                                                <option value=""><?php echo $this->lang->line('select_airmail_station'); ?></option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('train_or_flight') ?> *</label>
                                                            <input name="train_or_flight" placeholder="<?php echo $this->lang->line('train_or_flight'); ?> " class="form-control inner_shadow_red" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('received_from') ?> *</label>
                                                            <input name="received_from" placeholder="<?php echo $this->lang->line('received_from'); ?> " class="form-control inner_shadow_red" required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('drop_to') ?> *</label>
                                                            <input name="drop_to" placeholder="<?php echo $this->lang->line('drop_to'); ?> " class="form-control inner_shadow_red"  required="" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12">
                                                            <label><?php echo $this->lang->line('received_date') ?> *</label>
                                                            <input name="received_date" placeholder="<?php echo $this->lang->line('received_date'); ?> " class="form-control inner_shadow_red date" required="" autocomplete="off" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12 ">
                                                            <label><?php echo $this->lang->line('product_details'); ?> *</label>
                                                            <textarea required rows="1" name="product_details" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('product_details'); ?>"  ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12 ">
                                                            <label><?php echo $this->lang->line('delivery_details'); ?> *</label>
                                                            <textarea required rows="1" name="delivery_details" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('delivery_details'); ?>"  ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-12 ">
                                                            <label><?php echo $this->lang->line('remark'); ?> *</label>
                                                            <textarea required rows="1" name="remark" class="form-control inner_shadow_red" placeholder="<?php echo $this->lang->line('remark'); ?>"  ></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('person') ?> *</label>
                                                    <input name="airmail_person" id="airmail_person" value="1" placeholder="<?php echo $this->lang->line('person'); ?> " class="form-control inner_shadow_red" required="" type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('unit_rate') ?> *</label>
                                                    <input name="airmail_unit_rate" id="airmail_unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_red" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('total_bill') ?> *</label>
                                                    <input name="airmail_total_bill" id="airmail_total_bill" placeholder="<?php echo $this->lang->line('total_bill'); ?> " class="form-control inner_shadow_red" required="" type="number">
                                                </div>
                                            </div>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                        <div class="col-md-3">
                            <!-- Horizontal Form -->
                            <div class="box box-info box-solid">
                                <div class="box-header with-border">
                                    <h3 class="box-title"> <?php echo $this->lang->line('billing'); ?> </h3>
                                    <div class="box-tools pull-right">
                                        <!-- <a href="<?php echo base_url() ?>admin/mga-service-registration/list" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('service_registration_list'); ?> </a> -->
                                    </div>
                                </div>
                                <div class="box-body" style="min-height: 316px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('total_bill') ?> *</label>
                                                    <input name="total_bill" id="total_bill" placeholder="<?php echo $this->lang->line('total_bill'); ?> " class="form-control inner_shadow_info" required="" type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('discount') ?> *</label>
                                                    <input name="discount" id="discount" placeholder="<?php echo $this->lang->line('discount'); ?> " class="form-control inner_shadow_info" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('payable_amount') ?> *</label>
                                                    <input name="payable_amount" id="payable_amount" placeholder="<?php echo $this->lang->line('payable_amount'); ?> " class="form-control inner_shadow_info" required="" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('status'); ?> *</label>
                                                    <select name="status" class="select2 form-control inner_shadow_info" required="" id="">
                                                        <option value="" selected><?php echo $this->lang->line('select_status'); ?></option>
                                                        <option value="1">Yes</option>
                                                        <option value="0">No</option>
                                                    </select>                                        
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label><?php echo $this->lang->line('agent'); ?> *</label>
                                                    <br>
                                                    <select name="agent_id" required="" class="select2 form-control inner_shadow_success">
                                                        <option value="0" selected><?php echo $this->lang->line('no_agent'); ?></option>
                                                        <?php foreach ($agent_list as $value) { ?>
                                                            <option  value="<?php echo $value->id; ?>"><?php echo $value->firstname; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>
                        <div class="col-md-12">
                            <center>
                                <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                                <button type="submit" class="btn btn-sm btn-info"><?php echo $this->lang->line('save') ?></button>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            
        </form>
    </div>
</section>

<!-- Time Picker -->
<script>
     $(function(){
        $('.timepicker').timepicker({
            showInputs: false
        });
    });   
</script>

<!-- Date Picker -->
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

<!-- Mga script -->
<script>
    $(document).ready(function () {
    
        // this is for presend address change only
        $('#mga_service_station_id').change(function () {
           
            var mga_service_station_id = $('#mga_service_station_id').find(':selected').val();
            //alert(service_station_id);
            $.post("<?php echo base_url() . "admin/get_mga_service_station_rate"; ?>",
                {mga_service_station_id: mga_service_station_id},
                function (data) {
                    $('#mga_unit_rate').val(data + '');
                    mga_change_total_rate();
                });
           
        });
        
    
    });
    
    
</script>

<script>
    $(document).ready(function () {

        // get phone number and check client list start 
        $('input[name="phone"]').keyup(function(){
            if($('input[name="phone"]').val() > 1){
                get_client_info($('input[name="phone"]').val()); 
            }
        });
        // get phone number and check client list end


        // total amount change start 
        $('input[name="mga_person"]').keyup(function(){
            mga_change_total_rate(); 
        });

        $('input[name="mga_unit_rate"]').keyup(function(){
            mga_change_total_rate();
        });

        $('input[name="discount"]').keyup(function(){
            total_payable_amount();
        });

        // total amount change end
    

        // this is for presend address change only
        $('#service_type_id').change(function () {
            $('#mga_service_station_id').find('option').remove().end().append("<option value=''>Select Type First</option>");
            loadMgaStation($(this).find(':selected').val() );
        });
    
    
        // init the Type
        loadMgaType();
    
    });
    
    
    function loadMgaType() {
    
        $.post("<?php echo base_url() . "admin/get_mga_type"; ?>",
                {'asd': 'asd'},
                function (data2) {
    
                    var data = JSON.parse(data2);
                    $.each(data, function () {
    
                        $("#service_type_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
    
                });
    }
    
    function loadMgaStation(typeId) {
    
        $.post("<?php echo base_url() . "admin/get_mga_station/"; ?>" + typeId,
                {'nothing': 'nothing'},
                function (data2) {
                    var data = JSON.parse(data2);
                    $.each(data, function (i, item) {
    
                        $("#mga_service_station_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
                });
    
    }

    function mga_change_total_rate(){

        var mga_person =  $('input[name="mga_person"]').val();
        var mga_unit_rate = $('input[name="mga_unit_rate"]').val();

        var mga_total_bill = parseInt(mga_person) * parseInt(mga_unit_rate);
        $('input[name="mga_total_bill"]').val(''+mga_total_bill); 
        total_bill(); 
        
    }

    function get_client_info(phone_number){
        $.post("<?php echo base_url() . "admin/get_client_info/"; ?>",
            {phone_number: phone_number},
            function (data2) {
                var data = JSON.parse(data2); 
                $('input[name="name"]').val(''+data.name);
                $('input[name="client_id"]').val(''+ data.id);
                $('input[name="email"]').val(''+data.email);
                $('input[name="passport_number"]').val(''+data.passport_number);
            });
    } 
    
    
</script>

<!-- lounge Script -->
<script>
    $(document).ready(function () {
    
        // this is for presend address change only
        $('#lounge_service_station_id').change(function () {
           
            var lounge_service_station_id = $('#lounge_service_station_id').find(':selected').val();
            //alert(service_station_id);
            $.post("<?php echo base_url() . "admin/get_lounge_service_station_rate"; ?>",
                {lounge_service_station_id: lounge_service_station_id},
                function (data) {
                    $('#lounge_unit_rate').val(data + '');
                    lounge_change_total_rate();
                });
           
        });
        
    
    });
    
    
</script>

<script>
    $(document).ready(function () {

        // total aount change start 
        $('input[name="lounge_person"]').keyup(function(){
            lounge_change_total_rate(); 
        });
        $('input[name="lounge_unit_rate"]').keyup(function(){
            lounge_change_total_rate();
        }); 
        // total amount change end
    

        // this is for presend address change only
        $('#lounge_service_type_id').change(function () {
            $('#lounge_service_station_id').find('option').remove().end().append("<option value=''>Select Lounge First</option>");
            loadLoungeStation($(this).find(':selected').val() );
        });
    
    
        // init the Type
        loadLoungeType();
    
    });
    
    
    function loadLoungeType() {
    
        $.post("<?php echo base_url() . "admin/get_lounge_type"; ?>",
                {'asd': 'asd'},
                function (data2) {
    
                    var data = JSON.parse(data2);
                    $.each(data, function () {
    
                        $("#lounge_service_type_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
    
                });
    }
    
    function loadLoungeStation(typeId) {
    
        $.post("<?php echo base_url() . "admin/get_lounge_station/"; ?>" + typeId,
                {'nothing': 'nothing'},
                function (data2) {
                    var data = JSON.parse(data2);
                    $.each(data, function (i, item) {
    
                        $("#lounge_service_station_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
                });
    
    }

    function lounge_change_total_rate(){

        var lounge_person =  $('input[name="lounge_person"]').val();
        var lounge_unit_rate = $('input[name="lounge_unit_rate"]').val();

        var lounge_total_bill = parseInt(lounge_person) * parseInt(lounge_unit_rate);
        $('input[name="lounge_total_bill"]').val(''+lounge_total_bill);
        
        total_bill();
    }
    

</script>

<!-- Shuttle Script -->
<script>
    $(document).ready(function () {
    
        // this is for presend address change only
        $('#shuttle_service_station_id').change(function () {
           
            var shuttle_service_station_id = $('#shuttle_service_station_id').find(':selected').val();
            //alert(service_station_id);
            $.post("<?php echo base_url() . "admin/get_shuttle_service_station_rate"; ?>",
                {shuttle_service_station_id: shuttle_service_station_id},
                function (data) {
                    $('#shuttle_unit_rate').val(data + '');
                    shuttle_change_total_rate();
                });
           
        });
        
    
    });
    
</script>

<script>
    $(document).ready(function () {

        // total amount change start 
        $('input[name="shuttle_person"]').keyup(function(){
            shuttle_change_total_rate(); 
        });
        $('input[name="shuttle_unit_rate"]').keyup(function(){
            shuttle_change_total_rate();
        });

       
        // total amount change end
    

        // this is for presend address change only
        $('#shuttle_service_type_id').change(function () {
            $('#shuttle_service_station_id').find('option').remove().end().append("<option value=''>Select Type First</option>");
            loadShuttleStation($(this).find(':selected').val() );
        });
    
    
        // init the Type
        loadShuttleType();
    
    });
    
    
    function loadShuttleType() {
    
        $.post("<?php echo base_url() . "admin/get_shuttle_type"; ?>",
                {'asd': 'asd'},
                function (data2) {
    
                    var data = JSON.parse(data2);
                    $.each(data, function () {
    
                        $("#shuttle_service_type_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
    
                });
    }
    
    function loadShuttleStation(typeId) {
    
        $.post("<?php echo base_url() . "admin/get_shuttle_station/"; ?>" + typeId,
                {'nothing': 'nothing'},
                function (data2) {
                    var data = JSON.parse(data2);
                    $.each(data, function (i, item) {
    
                        $("#shuttle_service_station_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
                });
    
    }

    function shuttle_change_total_rate(){

        var shuttle_person =  $('input[name="shuttle_person"]').val();
        var shuttle_unit_rate = $('input[name="shuttle_unit_rate"]').val();

        var shuttle_total_bill = parseInt(shuttle_person) * parseInt(shuttle_unit_rate);
        $('input[name="shuttle_total_bill"]').val(''+shuttle_total_bill); 
        total_bill();
    }

    
</script>

<!-- Arimail Script -->
<script>
    $(document).ready(function () {

        // total amount change start 
        $('input[name="airmail_person"]').keyup(function(){
            airmail_change_total_rate(); 
        });
        $('input[name="airmail_unit_rate"]').keyup(function(){
            airmail_change_total_rate();
        });

        // total amount change end
    

        // this is for presend address change only
        $('#airmail_service_type_id').change(function () {
            $('#airmail_service_station_id').find('option').remove().end().append("<option value=''>Select Type First</option>");
            loadAirmailStation($(this).find(':selected').val() );
        });
    
    
        // init the Type
        loadAirmailType();
    
    });
    
    
    function loadAirmailType() {
    
        $.post("<?php echo base_url() . "admin/get_airmail_type"; ?>",
                {'asd': 'asd'},
                function (data2) {
    
                    var data = JSON.parse(data2);
                    $.each(data, function () {
    
                        $("#airmail_service_type_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
    
                });
    }
    
    function loadAirmailStation(typeId) {
    
        $.post("<?php echo base_url() . "admin/get_airmail_station/"; ?>" + typeId,
                {'nothing': 'nothing'},
                function (data2) {
                    var data = JSON.parse(data2);
                    $.each(data, function (i, item) {
    
                        $("#airmail_service_station_id").append($('<option>', {
                            value: this.id,
                            text: this.name,
                        }));
                    });
                });
    
    }

    function airmail_change_total_rate(){

        var airmail_person =  $('input[name="airmail_person"]').val();
        var airmail_unit_rate = $('input[name="airmail_unit_rate"]').val();

        var airmail_total_bill = parseInt(airmail_person) * parseInt(airmail_unit_rate);
        $('input[name="airmail_total_bill"]').val(''+airmail_total_bill); 
        total_bill();
    }
    
</script>

<!-- Billing Section -->
<script>
    function total_bill(){

        var mga_total     = $('input[name="mga_total_bill"]').val();
        if(mga_total > 0){ }else { mga_total = 0; }

        var lounge_total  = $('input[name="lounge_total_bill"]').val();
        if(lounge_total > 0){ }else { lounge_total = 0; }

        var shuttle_total = $('input[name="shuttle_total_bill"]').val();
        if(shuttle_total > 0){ }else { shuttle_total = 0; }

        var airmail_total = $('input[name="airmail_total_bill"]').val();
        if(airmail_total > 0){ }else { airmail_total = 0; }
       

        var total_bill = parseInt(mga_total) + parseInt(lounge_total) + parseInt(shuttle_total) + parseInt(airmail_total);
        $('input[name="total_bill"]').val(''+total_bill); 
        //total_payable_amount();

    }

    function total_payable_amount(){

    var discount   = $('input[name="discount"]').val();
    var total_bill = $('input[name="total_bill"]').val(); 

    var total_payable_amount = parseInt(total_bill) - parseInt(discount);
    $('input[name="payable_amount"]').val(''+total_payable_amount); 
    
}
</script>

