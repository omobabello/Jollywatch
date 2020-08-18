<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="recommended">
					<div class="recommended-info">
						<h3>Sports</h3>
					</div>
					<?php if (empty($results)) : ?>

							<div>
										No Result Found <?php echo "'{$search}'"; ?>
							</div>

					<?php else :
						 	$check=1;
							foreach($results as $result):
									if ( ($check - 1) % 3 == 0):
								?>

					<div class="recommended-grids">

					<?php endif; ?>
						<div class="col-md-4 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php echo site_url("home/watch/movies/{$result->video}") ?>"><img src="<?php echo "http://localhost/maradmin/{$result->thumbnail}.png"?>" alt="" /></a>
								<?php if(! empty($result->duration)) : ?>
									<div class="time small-time">
										<p><?php echo $result->duration;?></p>
									</div>
									<div class="clck small-clck">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								<?php endif; ?>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="<?php echo site_url("home/watch/{$result->tbl}/{$result->video}") ?>" class="title"><?php echo $result->title; ?></a></h5>
								<ul>
									<li><p class="author author-info"><a href="<?php echo site_url("home/user/{$result->name}") ?>" class="author"><?php echo $result->name ?></a></p></li>
									<li class="right-list"><p class="views views-info"><?php echo get_views($result->video). " views"?></p></li>
								</ul>
							</div>
						</div>
						<?php if ( ($check % 3 == 0) or $check == count($results) ): ?>
						<div class="clearfix"> </div>
					</div>
				<?php endif; $check++ ; ?>
			<?php endforeach; ?>
		<?php endif; ?>
								<?php echo $pagination ?>
				</div>
      </div>
