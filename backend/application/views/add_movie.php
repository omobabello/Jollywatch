
 	<div class="grid-form">
			<div class='grid-form1'>
					<div class="panel-body">
            <div class="progress col-md-12" id="progress-bar">
                    <div class="progress-bar progress-bar-primary" style="width: 0%">0%</div>
            </div>
              <p class='col-md-12 alert alert-danger' id='message'></p>
          <input type='hidden' id='upload-url' value="<?php echo site_url('home/add_movie') ?>" />
							<div class="form-group">
									<label for="exampleInputFile">Cover</label>
									<input type="file" id="cover" accept="image/*">
							</div>
							<div class="form-group">
									<label for="exampleInputFile">Thumbnail</label>
									<input type="file" id="thumb" accept="image/*">
							</div>
							<div class="form-group">
									<label for="exampleInputFile">Movie</label>
									<input type="file" id="movie" accept="video/*">
							</div>
							<div class="form-group">
										<label class="col-md-2 control-label">Title</label>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-header"></i>
												</span>
												<input type="text" class="form-control1" id='title' placeholder="Title">
											</div>
										</div>
								</div>
								<div class="form-group">
												<label for="txtarea1" class="col-sm-2 control-label">Description</label>
												<div class="col-sm-9">
													<div class='input-group'>
														<span class="input-group-addon">
															<i class="fa fa-file-text-o"></i>
														</span>
														<textarea  id="desc" placeholder="Describe this movie" cols="50" rows="4" class="form-control1"></textarea>
													</div>
												</div>
								</div>
                <div class="form-group">
    							<label class="col-md-2 control-label">Genre</label>
                  <div class='col-md-9'>
                  <?php foreach ($genres as $genre) : ?>
                    <div class="col-md-3">
                      <div class="input-group">
                        <div class="input-group-addon">
                        <input type="checkbox"  name='genre[]' value="<?php echo $genre->serial?>"></div>
                        <input type="text" class="form-control1" value="<?php echo $genre->name?>" disabled>
                      </div>
                    </div>
                  <?php endforeach; ?>
                </div>
						    </div>
                <div class="form-group">
    							<label class="col-md-2 control-label">Rating</label>
                  <div class="col-md-10">
      							<div class="col-md-2">
      								<div class="input-group">
      									<div class="input-group-addon"><input type="radio" name="rating" value="Family"></div>
      									<input type="text" value="Family" class="form-control1" disabled>
      								</div>
      							</div>
                    <div class="col-md-2">
      								<div class="input-group">
      									<div class="input-group-addon"><input type="radio" name="rating" value="PG 13"></div>
      									<input type="text" value="PG 13" class="form-control1" disabled>
      								</div>
      							</div>
                    <div class="col-md-2">
      								<div class="input-group">
      									<div class="input-group-addon"><input type="radio" name="rating" value="PG 16"></div>
      									<input type="text" value="PG 16" class="form-control1" disabled>
      								</div>
      							</div>
                    <div class="col-md-2">
      								<div class="input-group">
      									<div class="input-group-addon"><input type="radio" name="rating" value="18+"></div>
      									<input type="text" value="18+" class="form-control1" disabled>
      								</div>
      							</div>
                </div>
						    </div>
								<div class="form-group">
											<label class="col-md-2 control-label">Lead Actor</label>
											<div class="col-md-9">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-user"></i>
													</span>
													<input type="text" class="form-control1" id='lead-actor' placeholder="Lead Actor">
												</div>
											</div>
									</div>
									<div class="form-group">
												<label class="col-md-2 control-label">Other Actors</label>
												<div class="col-md-9">
													<div class="input-group">
														<span class="input-group-addon">
															<i class="fa fa-users"></i>
														</span>
														<input type="text" class="form-control1" id='other-acts' placeholder="Other main Actors, separate with Comma">
													</div>
												</div>
										</div>
										<div class="form-group">
													<label class="col-md-2 control-label">Production Year</label>
													<div class="col-md-9">
														<div class="input-group">
															<span class="input-group-addon">
																<i class="fa fa-calendar"></i>
															</span>
															<select class="form-control1" id='prod-year'>
                                  <option value="0">----Select Year-----</option>
  																<?php for($i=date('Y'); $i>=1980; $i--): ?>
  																	<option value="<?php echo $i ?>"><?php echo $i; ?></option>
  																<?php endfor; ?>
															</select>
														</div>
													</div>
											</div>
                      <div class="form-group">
      											<label class="col-md-2 control-label">Language</label>
      											<div class="col-md-9">
      												<div class="input-group">
      													<span class="input-group-addon">
      														<i class="fa fa-language"></i>
      													</span>
      													<input type="text" class="form-control1" id="language" placeholder="Language">
      												</div>
      											</div>
      									</div>
                           <div class="row">
                             <div class="col-sm-8 col-sm-offset-2">
                               <button id='btn-upload-movie' class='btn btn-info'><i class="fa fa-upload"></i> Upload</button>
                               <a class="btn-default btn" href="<?php echo site_url('home/my-videos') ?>">Cancel</a>
                               <button id='btn-reset' class='btn btn-inverse'>Reset</button>
                             </div>
                           </div>
						</div>
			</div>
</div>
