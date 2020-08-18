<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="recommended">
					<div class="recommended-info">
						<h3>Recently Uploaded Videos</h3>
					</div>
					<?php $check=1;
							foreach($videos as $video):
									if ( ($check - 1) % 4 == 0):
								?>

					<div class="recommended-grids">

					<?php endif; ?>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php echo site_url("home/watch/{$video->tbl}/{$video->video}") ?>"><img src="<?php echo "http://localhost/maradmin/{$video->thumbnail}.png"?>" alt="" /></a>
								<div class="time small-time">
									<p><?php echo $video->duration;?></p>
								</div>
								<div class="clck small-clck" style="margin-right: 1em;">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="<?php echo site_url("home/watch/{$video->tbl}/{$video->video}") ?>" class="title"><?php echo $video->title; ?></a></h5>
								<?php if ($video->tbl == 'episodes') : ?>
									<p><strong><em><?php echo "{$video->series} : Episode #".($video->season * 100 + $video->episode)?></em></strong></p>
								<?php else:  ?>
									<p><strong>Tag: <?php echo strtoupper(rtrim($video->tbl, 's')); ?></strong></p>
								<?php endif; ?>
								<ul>
									<li><p class="author author-info"><a href="#" class="author"><?php echo $video->name ?></a></p></li>
									<li class="right-list"><p class="views views-info"><?php echo get_views($video->video)." views"; ?></p></li>
								</ul>
							</div>
						</div>
						<?php if ( ($check % 4 == 0) or $check == count($videos) ): ?>
						<div class="clearfix"> </div>
					</div>
				<?php endif; $check++ ; ?>
			<?php endforeach; ?>
				</div>
      </div>
