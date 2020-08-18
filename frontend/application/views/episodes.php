<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="recommended">
					<div class="recommended-info">
						<h3>episodes</h3>
					</div>
					<?php $check=1;
							foreach($episodes as $episode):
									if ( ($check - 1) % 4 == 0):
								?>

					<div class="recommended-grids">

					<?php endif; ?>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php echo site_url("home/watch/episodes/{$episode->epi}") ?>"><img src="<?php echo "http://localhost/maradmin/{$episode->thumbnail}.png"?>" alt="" /></a>
								<div class="time small-time">
									<p><?php echo $episode->duration;?></p>
								</div>
								<div class="clck small-clck" style="margin-right: 1em;">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5> #<?php echo $episode->season * 100 + $episode->episode?> : <a href="<?php echo site_url("home/watch/episodes/{$episode->epi}") ?>" class="title"><?php echo $episode->title; ?></a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author"><?php echo $episode->name ?></a></p></li>
									<li class="right-list"><p class="views views-info"><?php echo get_views($episode->epi)." views"; ?></p></li>
								</ul>
							</div>
						</div>
						<?php if ( ($check % 4 == 0) or $check == count($episodes) ): ?>
						<div class="clearfix"> </div>
					</div>
				<?php endif; $check++ ; ?>
			<?php endforeach; ?>
				</div>
				<?php echo $pagination ?>
				<div class="clearfix"></div>
      </div>
