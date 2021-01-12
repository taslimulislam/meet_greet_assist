<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('shuttle_registration_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('user/shuttle-service-registration/add') ?>" class="btn bg-red btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('shuttle_registration_add'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <center>
                            <div class="btn-group">
                                <?php 
                                    foreach ($type_list as $value){ 
                                ?>
                                    <a href="<?php echo base_url('user/shuttle-service-registration/list/'.$value->id); ?>"  class="btn btn-primary"><?php echo $value->name; ?></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </center>
                        
                    </div>
                    <table id="userListTable" class="table table-bordered table-striped table_th_success">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('client_name'); ?> </th>
                                <th style="width: 12%;"><?php echo $this->lang->line('shuttle_type'); ?></th>
                                <th style="width: 12%;"><?php echo $this->lang->line('shuttle_station'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('start_from'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('end_to'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('travel_date'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                if ($shuttle_registration_list){

                                foreach ($shuttle_registration_list as $value){ 
                            ?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->client_name; ?> 
                                <td> <?php echo $value->type_name; ?> </td>
                                <td> <?php echo $value->station_name; ?> </td>
                                <td> <?php echo date("h:i a", strtotime($value->start_from)) ?> </td> 
                                <td> <?php echo date("h:i a", strtotime($value->end_to)) ?> </td> 
                                <td> <?php echo date("d M, Y ", strtotime($value->travel_date)) ?> </td>
                                
                                <td> 

                                    <a href="<?php echo base_url('user/invoice/view/'.$value->invoice_number); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                
                                </td>  
                            </tr>
                            <?php
                               }
                            }
                                ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
<script type="text/javascript">
    $(function () {
      $("#userListTable").DataTable();
    });
    
</script>

