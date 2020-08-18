<div class="content">
  <div class="recent-videos">
    <h5><img src="images/recent.png" alt="" />Recent-Videos <div class="search-right">
      <form>
        <input type="text"><input type="submit" value="" />
      </form>
    </div></h5>
      <?php $count = 1 ?>
      <?php foreach($movies as $movie)  : ?>
        <?php if( ($count - 1) % 3 == 0 ) : ?>
        <div class="grids grids2">
        <?php endif; ?>
        <div class="grid grid2">
          <h3><?php echo $movie->title ?></h3>
          <a href="single.html"><img src="<?php echo "http://localhost/maradmin/{$movie->cover}.png"?>" title="video-name"></a>
          <div class="time">
            <span><?php echo $movie->duration ?></span>
          </div>
          <div class="grid-info">
            <div class="video-share">
              <ul>
                <li><a href="#"><img src="images/likes.png" title="links"></a></li>
                <li><a href="#"><img src="images/link.png" title="Link"></a></li>
                <li><a href="#"><img src="images/views.png" title="Views"></a></li>
              </ul>
            </div>
            <div class="video-watch">
              <a href="single.html">Watch Now</a>
            </div>
            <div class="clear"> </div>
            <div class="lables">
              <p>Labels:<a href="#">Lorem</a></p>
            </div>
          </div>
      </div>
          <?php if( $count % 3 == 0 ) : ?>
              <div class="clear"> </div>
            </div>
          <?php endif; $count++?>
      <?php endforeach; ?>
  </div>
