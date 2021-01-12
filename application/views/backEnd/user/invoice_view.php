<section class="invoice">
   <!-- title row -->
   <div class="row">
      <div class="col-xs-12">
         <h2 class="page-header">
            <i class="fa fa-globe"></i> HRsoft BD
            <!-- <small class="pull-right">Date: 19/10/2020</small> -->
         </h2>
      </div>
      <!-- /.col -->
   </div>
   <!-- info row -->
   <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
         From
         <address>
            <strong>HRsoft BD</strong><br>
            12/6, Solimullah Road,<br>
            Mohammadpur, Dhaka 1207,<br> 
            Bangladesh.<br>
            Email: info@hrsoftbd.com
         </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
         To
         <address>
            <strong><?php echo $client_details->name; ?></strong><br>
            Phone: <?php echo $client_details->phone_number; ?><br>
            Email: <?php echo $client_details->email; ?><br>
            Passport Number: <?php echo $client_details->passport_number; ?><br>
            
         </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
         <b>Invoice Id :</b> <?php echo $invoice_number; ?><br>
         
         <b>Order Date :</b><?php echo date("d/m/Y", strtotime($order_date)) ?> <br>
         <b>Today : </b><?php echo date("d/m/Y");?><br>

      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <!-- Table row -->
   <div class="row">
      <div class="col-xs-12 table-responsive">
         <table class="table table-striped">
            <thead>
               <tr>
                <th style="width: 5%;">#</th> 
                <th style="width: 20%;"><?php echo $this->lang->line('type_name'); ?></th> 
                <th style="width: 60%;"><?php echo $this->lang->line('descriotion'); ?></th>    
                <th style="width: 10%; text-align: right;"><?php echo $this->lang->line('total_bill'); ?></th>               
               </tr>
            </thead>
            <tbody>
            <?php if($invoice_view_mga) {?>
               <tr>
                 <td><i class="fa fa-circle"></i></td>
                <td> <?php echo "MGA<br>".$invoice_view_mga->type_name; ?></td> 
                
                <td> <?php echo "<b>Start Time:</b> ". date("h:i a", strtotime($invoice_view_mga->start_time));
                echo " <b>Landing Time:</b> ". date("h:i a", strtotime($invoice_view_mga->landing_time));
                echo " <b>Journey Date:</b> ". date("d M, Y ", strtotime($invoice_view_mga->journey_date));
                echo " <b>Station Name:</b> ".$invoice_view_mga->stations_name;?></td> 
                <td style="text-align: right;"> <?php echo $invoice_view_mga->total_bill;?> ৳</td>
               </tr>
            <?php } ?>

            <?php if($invoice_view_lounge) {?>
               <tr>
               <td><i class="fa fa-circle"></i></td>
                <td> <?php echo "LOUNGE<br>".$invoice_view_lounge->type_name; ?></td>
                <td> <?php echo "<b>Start Time:</b> ". date("h:i a", strtotime($invoice_view_lounge->service_start_time));
                echo " <b>Landing Time:</b> ". date("h:i a", strtotime($invoice_view_lounge->landing_time));
                echo " <b>Journey Date:</b> ". date("d M, Y ", strtotime($invoice_view_lounge->journey_date));
                echo " <b>Station Name:</b> ". $invoice_view_lounge->stations_name;?></td> 
                <td style="text-align: right;"> <?php echo $invoice_view_lounge->total_bill;?> ৳</td>
               </tr>
            <?php } ?>

            <?php if($invoice_view_shuttle) {?>
               <tr>
               <td><i class="fa fa-circle"></i></td>
                <td> <?php echo "SHUTTLE<br>".$invoice_view_shuttle->type_name; ?></td>
                <td> <?php echo "<b>Start From:</b> ". date("h:i a", strtotime($invoice_view_shuttle->start_from));
                echo " <b>End To:</b> ". date("h:i a", strtotime($invoice_view_shuttle->end_to));
                echo " <b>Travel Date:</b> ". date("d M, Y ", strtotime($invoice_view_shuttle->travel_date));
                echo " <b>Station Name:</b> ". $invoice_view_shuttle->stations_name;?></td> 
                <td style="text-align: right;"> <?php echo $invoice_view_shuttle->total_bill;?> ৳</td>
               </tr>
            <?php } ?>

            <?php if($invoice_view_airmail) {?>
               <tr>
               <td><i class="fa fa-circle"></i></td>
                <td> <?php echo "AIRMAIL<br>".$invoice_view_airmail->type_name; ?></td>
                <td> <?php echo "<b>Received From:</b> ". $invoice_view_airmail->received_from;
                echo " <b>Drop To:</b> ". $invoice_view_airmail->drop_to;
                echo " <b>Received Date:</b> ". date("d M, Y ", strtotime($invoice_view_airmail->received_date));
                echo " <b>Station Name:</b> ". $invoice_view_airmail->stations_name;?></td> 
                <td style="text-align: right;"> <?php echo $invoice_view_airmail->total_bill;?> ৳</td>
               </tr>
            <?php } ?>
            </tbody>
         </table>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
         <p class="lead">Payment Methods:</p>
         <button type="button" class="btn btn-success "><i class="fa fa-dollar"></i> Add Payment</button>
         <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
         <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
         <img src="../../dist/img/credit/american-express.png" alt="American Express">
         <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
         <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
         </p> -->
      </div>
      <!-- /.col -->
      <div class="col-xs-6">
         
         <div class="table-responsive" >
         <p class="lead">Summary</p>
            <table class="table">
               <tbody>
                  <tr>
                     <th style="width:78%" >Subtotal:</th>
                     <td style="text-align: right;"> <?php echo $total_bill; ?> ৳</td>
                  </tr>
                  <tr>
                     <th>Discount:</th>
                     <td style="text-align: right;"> <?php echo $discount; ?> ৳</td>
                  </tr>
                  <tr>
                     <th>Total:</th>
                     <td style="text-align: right;"> <?php echo $payable_amount; ?> ৳</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      <!-- /.col -->
   </div>
   <!-- /.row -->
   <!-- this row will not appear when printing -->
   <div class="row no-print">
      <div class="col-xs-12">
         <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
         <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
         </button>
         <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
         <i class="fa fa-download"></i> Generate PDF
         </button>
      </div>
   </div>
</section>