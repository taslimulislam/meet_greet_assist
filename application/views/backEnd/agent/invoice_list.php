<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $this->lang->line('invoice_list'); ?></h3>
                    <div class="box-tools pull-right">
                        <a href="<?php echo base_url('agent/invoice/add') ?>" class="btn bg-red btn-sm"><i class="fa fa-plus"></i> <?php echo $this->lang->line('invoice_add'); ?></a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="userListTable" class="table table-bordered table-striped table_th_primary">
                        <thead>
                            <tr>
                                <th style="width: 5%;"><?php echo $this->lang->line('sl'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('client_name'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('invoice_number'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('remarks'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('payable_amount'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('total_bill'); ?></th>
                                <th style="width: 10%;"><?php echo $this->lang->line('action'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sl = 1;
                                if ($invoice_list){

                                foreach ($invoice_list as $value){ 
                            ?>
                            <tr>
                                <td> <?php echo $sl++ ; ?> </td>
                                <td> <?php echo $value->client_name; ?> </td>
                                <td> <?php echo $value->invoice_number;?>  </td>
                                <td> <?php echo $value->remarks;?>  </td>
                                <td> <?php echo $value->payable_amount;?>  </td>
                                <td> <?php echo $value->total_bill;?>  </td>
                                
                                <td> 
                                    <a href="<?php echo base_url('agent/invoice/view/'.$value->invoice_number); ?>" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                    <a href="<?php echo base_url('agent/invoice/delete/'.$value->invoice_number); ?>" class="btn btn-sm btn-danger" onclick = 'return confirm("Are You Sure?")'><i class="fa fa-trash"></i></a>
                                    <a href="<?php echo base_url().'agent/invoice_status/'.$value->id.'/'. abs($value->approve_status-1) ;?>" > <?php echo $value->approve_status == 1 ? '<i class="btn btn-sm btn-success fa fa-thumbs-o-up"></i>':'<i class="btn btn-sm btn-warning fa fa-thumbs-o-down"></i>'; ?> </a>
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

