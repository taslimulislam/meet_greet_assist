<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('airmail_registration_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/airmail-service-registration/add') ?>" class="btn bg-green btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('airmail_registration_add'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <center>
                            <div class="btn-group">
                                <?php 
                                    foreach ($airmail_type_list as $value){ 
                                ?>
                                    <a href="<?php echo base_url('admin/airmail-service-registration/list/'.$value->id); ?>"  class="btn btn-primary"><?php echo $value->name; ?></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </center>
                        
                    </div>
                    <table id="userListTable" class="table table-bordered table-striped table_th_maroon">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('client_name'); ?></th>
                                <th style="width: 12%;"><?php echo $this->lang->line('airmail_type'); ?></th>
                                <th style="width: 12%;"><?php echo $this->lang->line('airmail_station'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('received_from'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('drop_to'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('received_date'); ?></th>
                                <th style="width: 5%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                if ($airmail_registration_list){

                                foreach ($airmail_registration_list as $value){ 
                            ?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->client_name; ?> 
                                <td> <?php echo $value->type_name; ?> </td>
                                <td> <?php echo $value->station_name; ?> </td>
                                <td> <?php echo $value->received_from; ?> </td> 
                                <td> <?php echo $value->drop_to; ?> </td> 
                                <td> <?php echo date("d M, Y ", strtotime($value->received_date)) ?> </td>
                                
                                <td> 
                                   
                                    <a href="<?php echo base_url('admin/invoice/view/'.$value->invoice_number); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                   
                                    
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

