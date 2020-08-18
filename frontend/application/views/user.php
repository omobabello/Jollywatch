<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="col-sm-12">
						<h3><?php echo "Most viewed video by {$title} : <strong>{$most_viewed->title}</strong>"?></h3>
							<div class="col-md-8 resent-grid recommended-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="<?php echo site_url("home/watch/{$most_viewed->table}/{$most_viewed->id}") ?>"><img src="<?php echo "http://localhost/maradmin/{$most_viewed->thumbnail}.png"?>" alt="" /></a>
									<div class="time small-time">
										<p><?php echo $most_viewed->duration;?></p>
									</div>
									<div class="clck small-clck">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info video-info-grid">
									<h5><a href="<?php echo site_url("home/watch/{$most_viewed->table}/{$most_viewed->id}") ?>" class="title"><?php echo $most_viewed->title; ?></a></h5>
									<ul>
										<li><p class="author author-info"><a href="#" class="author"><?php echo $title ?></a></p></li>
										<li class="right-list"><p class="views views-info"><?php echo get_views($most_viewed->id)." views"; ?></p></li>
									</ul>
								</div>
							</div>
				</div>
				<div class="clearfix"> </div>
				<?php if (!empty($skits)) : ?>
					<div class="recommended">
					<div class="recommended-grids english-grid">
						<div class="recommended-info">
							<div class="heading">
								<h3><?php echo "Skits by {$title} : " ?></h3>
							</div>
							<div class="heading-right">
								<a  href="<?php echo site_url("home/skits/{$user}")?>" class="play-icon popup-with-zoom-anim">More</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php foreach ($skits as $skit) : ?>
						<div class="col-md-2 resent-grid recommended-grid show-video-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php echo site_url("home/watch/skits/{$skit->id}")?>"><img src="<?php echo "http://localhost/maradmin/{$skit->thumbnail}.png" ?>" alt="" /></a>
								<div class="time small-time show-time">
									<p><?php echo $skit->duration?></p>
								</div>
								<div class="clck show-clock">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="<?php echo site_url("home/watch/skits/{$skit->id}")?>" class="title"><?php echo $skit->title ?></a></h5>
								<p class="views"><?php echo get_views($skit->id)." views"?></p>
							</div>
						</div>
						<?php endforeach; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php endif; ?>

				<?php if (!empty($movies)) : ?>
					<div class="recommended">
					<div class="recommended-grids english-grid">
						<div class="recommended-info">
							<div class="heading">
								<h3><?php echo "Movies by {$title} : " ?></h3>
							</div>
							<div class="heading-right">
								<a  href="<?php echo site_url("home/movies/{$user}")?>" class="play-icon popup-with-zoom-anim">More</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php foreach ($movies as $movie) : ?>
						<div class="col-md-2 resent-grid recommended-grid show-video-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php echo site_url("home/watch/movies/{$movie->id}")?>"><img src="<?php echo "http://localhost/maradmin/{$movie->thumbnail}.png" ?>" alt="" /></a>
								<div class="time small-time show-time">
									<p><?php echo $movie->duration?></p>
								</div>
								<div class="clck show-clock">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="<?php echo site_url("home/watch/movies/{$movie->id}")?>" class="title"><?php echo $movie->title ?></a></h5>
								<p class="views"><?php echo get_views($movie->id)." views"?></p>
							</div>
						</div>
						<?php endforeach; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php endif; ?>

				<?php if (!empty($series)) : ?>
					<div class="recommended">
					<div class="recommended-grids english-grid">
						<div class="recommended-info">
							<div class="heading">
								<h3><?php echo "Sereis by {$title} : " ?></h3>
							</div>
							<div class="heading-right">
								<a  href="<?php echo site_url("home/series/{$user}")?>" class="play-icon popup-with-zoom-anim">More</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<?php foreach ($series as $serie) : ?>
						<div class="col-md-2 resent-grid recommended-grid show-video-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="<?php echo site_url("home/episodes/{$serie->id}")?>"><img src="<?php echo "http://localhost/maradmin/{$serie->cover}.png" ?>" alt="" /></a>
							</div>
							<div class="resent-grid-info recommended-grid-info">
								<h5><a href="<?php echo site_url("home/episodes/{$serie->id}")?>" class="title"><?php echo $serie->title ?></a></h5>
							</div>
						</div>
						<?php endforeach; ?>
						<div class="clearfix"> </div>
					</div>
				</div>
				<?php endif; ?>
			</div>
