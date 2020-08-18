<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
        <div class="recommended">
          <div class="recommended-info">
									<h3>Series</h3>
					</div>
          <?php $check=1;
              foreach($series as $serie):
                  if ( ($check - 1) % 4 == 0):
                ?>

          <div class="recommended-grids">

          <?php endif; ?>
          <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="<?php echo site_url("home/episodes/{$serie->series}") ?>"><img src="<?php echo "http://localhost/maradmin/{$serie->cover}.png" ?>" alt="" /></a>
								</div>
								<div class="resent-grid-info recommended-grid-info recommended-grid-serie-info">
									<h5><a href="<?php echo site_url("home/episodes/{$serie->series}") ?>" class="title"><?php echo $serie->title ?></a></h5>
									<ul>
										<li><p class="author author-info"><a href="<?php echo site_url("home/user/{$serie->prod}") ?>" class="author"><?php echo $serie->name ?></a></p></li>
										<li class="right-list"><p class="views views-info">2,114,200 views</p></li>
									</ul>
								</div>
						</div>
            <?php if ( ($check % 4 == 0) or $check == count($series) ): ?>
						<div class="clearfix"> </div>
					</div>
				<?php endif; $check++ ; ?>
			<?php endforeach; ?>
        </div>
        <?php echo $pagination ?>
      <div class="clearfix"></div>
    </div>
