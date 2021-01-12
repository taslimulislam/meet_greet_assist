<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('shuttle_station_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/shuttle-service-station/add') ?>" class="btn bg-red btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('shuttle_station_add'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <center>
                            <div class="btn-group">
                                <?php 
                                    foreach ($shuttle_type_list as $value){ 
                                ?>
                                    <a href="<?php echo base_url('admin/shuttle-service-station/list/'.$value->id); ?>"  class="btn btn-primary"><?php echo $value->name; ?></a>
                                <?php
                                    }
                                ?>
                            </div>
                        </center>
                    </div>
                    <table id="userListTable" class="table table-bordered table-striped table_th_info">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('shuttle_service_type'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('name'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('unit_rate'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                if ($shuttle_station_list){

                                foreach ($shuttle_station_list as $value){ 
                            ?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->shuttle_type_name; ?> </td>
                                <td> <?php echo $value->name?>  </td>
                                <td> <?php echo $value->unit_rate?>  </td>
                                
                                <td> 
                                    <a href="<?php echo base_url('admin/shuttle-service-station/edit/'.$value->id); ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/shuttle-service-station/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
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

