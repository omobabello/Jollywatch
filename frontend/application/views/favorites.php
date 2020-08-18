<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
     <div class="show-top-grids">
       <div class="main-grids news-main-grids">
         <div class="recommended-info">
           <h3>Your Favorites</h3>
           <?php foreach($favorites as $favorite) : ?>
             <a href="<?php echo site_url("home/watch/{$favorite->tbl}/{$favorite->video}") ?>"><div class="history-grids">
               <div class="col-md-2 history-left">
                 <p><?php echo date('F <br/> Y', $favorite->date_stamp); ?></p>
               </div>
               <div class="col-md-9 history-right">
                 <h5><?php echo $favorite->title ?></h5>
                 <p><?php echo $favorite->description ?></p>
               </div>
               <div class="clearfix"> </div>
           </div></a>
           <?php endforeach; ?>
         </div>
       </div>
     </div>
