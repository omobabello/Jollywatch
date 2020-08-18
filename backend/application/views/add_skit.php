 	<div class="grid-form">
			<div class='grid-form1'>
					<div class="panel-body">
            <div class="progress col-md-12" id="progress-bar">
                    <div class="progress-bar progress-bar-primary" style="width: 0%">0%</div>
            </div>
              <p class='col-md-12 alert alert-danger' id='message'></p>
							<div class="form-group">
									<label for="exampleInputFile">Thumbnail</label>
									<input type="file"  id='thumb' accept="image/*">
							</div>
							<div class="form-group">
									<label for="exampleInputFile">Video</label>
									<input type="file"  id='movie' accept="video/*">
							</div>
              <input type='hidden' id='upload-url' value="<?php echo site_url('home/add_skit') ?>" >
							<div class="form-group">
										<label class="col-md-2 control-label">Title</label>
										<div class="col-md-9">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="fa fa-header"></i>
												</span>
												<input type="text" class="form-control1" placeholder="Title" id="title">
											</div>
										</div>
								</div>
								<div class="form-group">
												<label for="txtarea1" class="col-sm-2 control-label">Caption</label>
												<div class="col-sm-9">
													<div class='input-group'>
														<span class="input-group-addon">
															<i class="fa fa-file-text-o"></i>
														</span>
														<textarea id="desc" cols="50" rows="4" class="form-control1"></textarea>
													</div>
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
                         <div class="row">
                             <div class="col-sm-8 col-sm-offset-2">
                               <button id='btn-upload-skit' class="btn btn-info"><i class='fa fa-upload'></i> Upload</button>
                               <a class="btn-default btn" href="<?php echo site_url('home/my-videos') ?>">Cancel</a>
                               <?php echo form_reset('reset', 'Reset', array('class' => 'btn btn-inverse')) ?>
                             </div>
                           </div>
						</div>
			</div>
</div>
