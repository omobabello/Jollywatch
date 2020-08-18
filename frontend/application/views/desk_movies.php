<div class="categories-types">
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
          <a href="<?php echo site_url('home/watch/movies/'.$movie->movie) ?>"><img src="<?php echo "http://localhost/maradmin/{$movie->thumbnail}.png"?>" title="<?php echo $movie->title ?>"></a>
            <div class="time">
              <span><?php echo $movie->duration ?></span>
            </div>
          <div class="grid-info">
            <div class="video-share">
              <ul>
                <li><a href="#"><img src="<?php echo assets_url('images/likes.png') ?>" title="links"></a>400</li>
                <li><a href="#"><img src="<?php echo assets_url('images/views.png') ?>" title="Views"></a>500</li>
              </ul>
            </div>
            <div class="video-watch">
              <a href="<?php echo site_url('home/watch/movies/'.$movie->movie) ?>">Watch Now</a>
            </div>
            <div class="clear"> </div>
            <div class="lables">
              <p>Labels:<a href="#"><?php echo $movie->name ?></a></p>
            </div>
          </div>
      </div>
          <?php if( $count % 3 == 0 ) : ?>
              <div class="clear"> </div>
            </div>
          <?php endif; $count++?>
      <?php endforeach; ?>
  </div>
    <div class="clear"></div>
      <?php echo $pagination ?>
    <div class="clear"></div>
