<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <div class="show-top-grids">
       <div class="main-grids news-main-grids">
         <div class="recommended-info">
           <h3>Your History</h3>
           <?php foreach($histories as $history) : ?>
             <a href="<?php echo site_url("home/watch/{$history->tbl}/{$history->video}") ?>"><div class="history-grids">
               <div class="col-md-1 history-left">
                 <p><?php echo date('F <br/> Y', $history->date_stamp)?></p>
               </div>
               <div class="col-md-9 history-right">
                 <h5><?php echo $history->title ?></h5>
                 <p><?php echo $history->description ?></p>
               </div>
               <div class="clearfix"> </div>
           </div></a>
           <?php endforeach; ?>
         </div>
       </div>
     </div>
