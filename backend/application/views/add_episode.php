 	<div class="grid-form">
			<div class='grid-form1'>
					<div class="panel-body">
            <div class="progress col-md-12" id="progress-bar">
                    <div class="progress-bar progress-bar-primary" style="width: 0%">0%</div>
            </div>
              <p class='col-md-12 alert alert-danger' id='message'></p>
              <input type="hidden" id='upload-url' value="<?php echo site_url('home/add_episode') ?>" />
              <input type="hidden" id='series' value="<?php echo $series?>" />
							<div class="form-group">
									<label for="exampleInputFile">Thumbnail</label>
									<input type="file"  id='thumb' accept="image/*">
							</div>
							<div class="form-group">
									<label for="exampleInputFile">Video</label>
									<input type="file"  id='movie' accept="video/*">
							</div>
							<div class="form-group">
										<label class="col-md-2 control-label">Title</label>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-header"></i>
												</span>
												<input type="text" class="form-control1" placeholder="Episode Title" id='title'>
											</div>
										</div>
								</div>
								<div class="form-group">
                    <label  class="col-sm-2 control-label">Season And Episode</label>
          							<div class="col-md-4">
          								<input type="text" class="form-control1" placeholder="<?php echo "Season {$last_season}"?>" readonly="">
                          <input type="hidden" id="season" value="<?php echo $last_season?>" />
          							</div>
												<div class="col-md-4">
													<div class='input-group'>
														<span class="input-group-addon">
															<i class="fa fa-list-ol"></i>
														</span>
														<input type="number" min="<?php echo $last_episode+1 ?>" max="<?php echo $last_episode+3 ?>" class="form-control1" placeholder="Number" id="episode">
													</div>
												</div>
								</div>
                         <div class="row">
                             <div class="col-sm-8 col-sm-offset-2">
                                <button id='btn-new-episode' class='btn btn-info'><i class="fa fa-upload"></i> Upload</button>
                               <a class="btn-default btn" href="<?php echo site_url('home/my-videos') ?>">Cancel</a>
                               <button id='btn-reset' class='btn btn-inverse'>Reset</button>
                             </div>
                           </div>
						</div>
			</div>
</div>
