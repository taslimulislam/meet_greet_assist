<section class="content">
    <div class="row">
        <form action="<?php echo base_url("agent/lounge-service-registration/add");?>" method="post" enctype="multipart/form-data" class="form-horizontal">
            <div class="col-md-3">
                <!-- Horizontal Form -->
                <div class="box box-primary box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $this->lang->line('client_add'); ?> </h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="<?php echo base_url() ?>agent/client/list" class="btn bg-red btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('client_list'); ?> </a> -->
                        </div>
                    </div>
                    <div class="box-body"  style="min-height: 316px;">
                        <div class="row"> 
                            <input type="hidden" name="client_id" value="0">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('phone') ?> *</label>
                                        <input name="phone" autocomplete="off" placeholder="<?php echo $this->lang->line('phone'); ?> " class="form-control inner_shadow_primary" required="" pattern="[0]{1}[1]{1}[3|4|5|6|7|8|9]{1}[0-9]{8}" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('name') ?> *</label>
                                        <input name="name" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_primary" required="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('email') ?> *</label>
                                        <input name="email" placeholder="<?php echo $this->lang->line('email'); ?> " class="form-control inner_shadow_primary" required="" type="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('pasport') ?> *</label>
                                        <input name="passport_number" placeholder="<?php echo $this->lang->line('name'); ?> " class="form-control inner_shadow_primary" required="" type="text">
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-teal box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $this->lang->line('lounge_registration_add'); ?> </h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="<?php echo base_url() ?>agent/lounge-service-registration/list" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('lounge_registration_list'); ?> </a> -->
                        </div>
                    </div>
                    <div class="box-body" style="min-height: 316px;">
                        <div class="row">
                            <div class=""> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('lounge_type'); ?> *</label>
                                            <select class="form-control select2" name="service_type_id" id="service_type_id" required >
                                                <option value=""><?php echo $this->lang->line('select_lounge_type'); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label><?php echo $this->lang->line('lounge_station') ?> *</label>
                                            <select class="form-control select2" name="service_station_id" id="lounge_service_station_id" required >
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <div class="col-md-3">
                <!-- Horizontal Form -->
                <div class="box box-info box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title"> <?php echo $this->lang->line('billing'); ?> </h3>
                        <div class="box-tools pull-right">
                            <!-- <a href="<?php echo base_url() ?>agent/mga-service-registration/list" class="btn bg-purple btn-sm" style="color: white;"> <i class="fa fa-list"></i> <?php echo $this->lang->line('service_registration_list'); ?> </a> -->
                        </div>
                    </div>
                    <div class="box-body" style="min-height: 316px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('person') ?> *</label>
                                        <input name="person" id="person" value="1" placeholder="<?php echo $this->lang->line('person'); ?> " class="form-control inner_shadow_info" required="" type="number">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('unit_rate') ?> *</label>
                                        <input name="unit_rate" id="unit_rate" placeholder="<?php echo $this->lang->line('unit_rate'); ?> " class="form-control inner_shadow_info" required="" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label><?php echo $this->lang->line('total_bill') ?> *</label>
                                        <input name="total_bill" id="total_bill" placeholder="<?php echo $this->lang->line('total_bill'); ?> " class="form-control inner_shadow_info" required="" type="number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
            <div class="col-md-12">
                <center>
                    <button type="reset" class="btn btn-sm bg-red"><?php echo $this->lang->line('reset') ?></button>
                    <button type="submit" class="btn btn-sm btn-info"><?php echo $this->lang->line('save') ?></button>
                </center>
            </div>
        </form>
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

<script>
    $(document).ready(function () {
    
        // this is for presend address change only
        $('#lounge_service_station_id').change(function () {
           
            var lounge_service_station_id = $('#lounge_service_station_id').find(':selected').val();
            //alert(service_station_id);
            $.post("<?php echo base_url() . "agent/get_lounge_service_station_rate"; ?>",
                {lounge_service_station_id: lounge_service_station_id},
                function (data) {
                    $('#unit_rate').val(data + '');
                    change_total_rate();
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


        // total aount change start 
        $('input[name="person"]').keyup(function(){
            change_total_rate(); 
        });
        $('input[name="unit_rate"]').keyup(function(){
            change_total_rate();
        });
        // total amount change end
    

        // this is for presend address change only
        $('#service_type_id').change(function () {
            $('#lounge_service_station_id').find('option').remove().end().append("<option value=''>Select Lounge First</option>");
            loadLoungeStation($(this).find(':selected').val() );
        });
    
    
        // init the Type
        loadLoungeType();
    
    });
    
    
    function loadLoungeType() {
    
        $.post("<?php echo base_url() . "agent/get_lounge_type"; ?>",
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
    
    function loadLoungeStation(typeId) {
    
        $.post("<?php echo base_url() . "agent/get_lounge_station/"; ?>" + typeId,
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

    function change_total_rate(){

        var person =  $('input[name="person"]').val();
        var unit_rate = $('input[name="unit_rate"]').val();

        var total_bill = parseInt(person) * parseInt(unit_rate);
        $('input[name="total_bill"]').val(''+total_bill);
        
    }

    function get_client_info(phone_number){
        $.post("<?php echo base_url() . "agent/get_client_info/"; ?>",
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
