<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('lounge_station_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('admin/lounge-service-station/add') ?>" class="btn bg-green btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('lounge_station_add'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-12">
                        <center>
                            <div class="btn-group">
                                <?php 
                                    foreach ($lounge_type_list as $value){ 
                                ?>
                                    <a href="<?php echo base_url('admin/lounge-service-station/list/'.$value->id); ?>"  class="btn btn-primary"><?php echo $value->name; ?></a>
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
                                <th style="width: 15%;"><?php echo $this->lang->line('lounge_service_type'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('name'); ?></th>
                                <th style="width: 15%;"><?php echo $this->lang->line('unit_rate'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                if ($lounge_station_list){

                                foreach ($lounge_station_list as $value){ 
                            ?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->lounge_type_name; ?> </td>
                                <td> <?php echo $value->name?>  </td>
                                <td> <?php echo $value->unit_rate?>  </td>
                                
                                <td> 
                                    <a href="<?php echo base_url('admin/lounge-service-station/edit/'.$value->id); ?>" class="btn btn-sm bg-green"><i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('admin/lounge-service-station/delete/'.$value->id); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
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

