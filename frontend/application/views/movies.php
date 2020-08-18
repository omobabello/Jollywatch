<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
        <div class="recommended">
          <div class="recommended-info">
									<h3>Movies</h3>
					</div>
          <?php $check=1;
              foreach($movies as $movie):
                  if ( ($check - 1) % 4 == 0):
                ?>

          <div class="recommended-grids">

          <?php endif; ?>
          <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="<?php echo site_url("home/watch/movies/{$movie->movie}") ?>"><img src="<?php echo "http://localhost/maradmin/{$movie->cover}.png" ?>" alt="" /></a>
									<div class="time small-time show-time movie-time">
										<p><?php echo $movie->duration ?></p>
									</div>
									<div class="clck movie-clock">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
									<h5><a href="<?php echo site_url("home/watch/movies/{$movie->movie}") ?>" class="title"><?php echo $movie->title ?></a></h5>
									<ul>
										<li><p class="author author-info"><a href="<?php echo site_url("home/user/{$movie->prod}") ?>" class="author"><?php echo $movie->name ?></a></p></li>
										<li class="right-list"><p class="views views-info"><?php echo get_views($movie->movie) . " views"?></p></li>
									</ul>
								</div>
						</div>
            <?php if ( ($check % 4 == 0) or $check == count($movies) ): ?>
						<div class="clearfix"> </div>
					</div>
				<?php endif; $check++ ; ?>
			<?php endforeach; ?>
        </div>
        <?php echo $pagination ?>
      <div class="clearfix"></div>
    </div>
