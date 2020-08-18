<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-9 single-left">
					<input type="hidden" id='like-url' value="<?php echo site_url("home/like/{$video->id}") ?>"/>
					<div class="song">
						<div class="song-info">
							<h3><?php echo $video->title ?></h3>
						</div>
						<div class="video-grid">
							<video id="my-video" class="video-js" controls preload="auto" poster="<?php echo 'http://localhost/maradmin/'.$video->thumbnail ?>" width="750" height="300" data-setup="{}">
                    <source src="<?php echo 'http://localhost/maradmin/'.$video->link?>" type="video/mp4">
                    <source src="<?php echo 'http://localhost/maradmin/'.$video->link?>" type="video/flv">
										<source src="<?php echo 'http://localhost/maradmin/'.$video->link?>" type="video/x-matroska">
              </video>
						</div>
						<div class="dash">
								<button class="icon like" id="btn-like">Like</button>
								<button class="icon comment-icon" id="btn-comment">Comments</button>
								<a href="#report"> Report Video </button>
								<a class="view"><?php echo get_views($video->id)." Views" ?></a>
						</div>
					</div>
					<div class="clearfix"> </div>
					<div class="published">
								<ul id="myList">
									<li>
										<h4>Published on <?php echo date('jS F Y', $video->upload_time)?></h4>
										<p><?php echo $video->description ?></p>
									</li>
									<?php if (! empty($genres)) : ?>
									<li>
										<div class="load-grids">
											<div class="load-grid">
												<p>Category</p>
											</div>
											<?php foreach($genres as $genre => $gen): ?>
											<div class="load-grid">
												<a href="movies.html"><?php echo $genre ?></a>
											</div>
										<?php endforeach; ?>
											<div class="clearfix"> </div>
										</div>
									</li>
								<?php endif; ?>
								</ul>
					</div>
					<div class="all-comments">
						<div class="all-comments-info">
							<a href="#">All Comments (8,657)</a>
							<div class="box">
								<form>
									<input type="text" placeholder="Name" required=" ">
									<input type="text" placeholder="Email" required=" ">
									<input type="text" placeholder="Phone" required=" ">
									<textarea placeholder="Message" required=" "></textarea>
									<input type="submit" value="SEND">
									<div class="clearfix"> </div>
								</form>
							</div>
							<div class="all-comments-buttons">
								<ul>
									<li><a href="#" class="top">Top Comments</a></li>
									<li><a href="#" class="top newest">Newest First</a></li>
									<li><a href="#" class="top my-comment">My Comments</a></li>
								</ul>
							</div>
						</div>
						<div class="media-grids">
							<div class="media">
								<h5>Tom Brown</h5>
								<div class="media-left">
									<a href="#">

									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
							<div class="media">
								<h5>Mark Johnson</h5>
								<div class="media-left">
									<a href="#">

									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
							<div class="media">
								<h5>Steven Smith</h5>
								<div class="media-left">
									<a href="#">

									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
							<div class="media">
								<h5>Marry Johne</h5>
								<div class="media-left">
									<a href="#">

									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
							<div class="media">
								<h5>Mark Johnson</h5>
								<div class="media-left">
									<a href="#">
											X
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
							<div class="media">
								<h5>Mark Johnson</h5>
								<div class="media-left">
									<a href="#">
										Y
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
							<div class="media">
								<h5>Peter Johnson</h5>
								<div class="media-left">
									<a href="#">
											Z
									</a>
								</div>
								<div class="media-body">
									<p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium hendrerit maecenas imperdiet ipsum id ex pretium hendrerit</p>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 single-right">
					<h3>Related Videos</h3>
					<div class="single-grid-right">
						<?php foreach($related_videos as $related_video) : ?>
							<div class="single-right-grids">
								<div class="col-md-4 single-right-grid-left">
									<a href="<?php echo site_url("home/watch/{$related_video->tbl}/{$related_video->related}")?>"><img src="<?php echo "http://localhost/maradmin/{$related_video->thumbnail}.png"?>" alt="" /></a>
								</div>
								<div class="col-md-8 single-right-grid-right">
									<a href="<?php echo site_url("home/watch/{$related_video->tbl}/{$related_video->related}")?>" class="title"><?php echo $related_video->title ?></a>
									<p class="author"><a href="<?php echo site_url("home/user/{$related_video->user}") ?>" class="author"><?php echo $related_video->name ?></a></p>
									<p class="views"><?php echo get_views($related_video->related)." views";?></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
