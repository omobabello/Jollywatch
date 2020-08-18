<div class="graph">
    <div class="col-md-6">
      <video id="my-video" class="video-js" controls preload="auto" poster="<?php echo 'http://localhost/maradmin/'.$video->thumbnail ?>" width="100%" height="100%" data-setup="{}">
            <source src="<?php echo 'http://localhost/maradmin/'.$video->link?>" type="video/mp4">
            <source src="<?php echo 'http://localhost/maradmin/'.$video->link?>" type="video/flv">
      </video>
    </div>
    <script src="<?php echo assets_url('js/Chart.js') ?>"></script>
    <div class="col-md-6">
                <h5> Views For the past week <h5>
								<canvas id="line1" height="300" width="500" style="width: 100%; height: 100%;"></canvas>
                <?php $labels = NULL; $datas = NULL;
                      for($i=7; $i>=0; $i--){
                        $day = strtotime("-{$i} days");
                        $labels .= '"'.date("D", $day).'",';
                          $found = FALSE;
                          foreach ($chart as $element){
                            $comp1 = intval($element->day / 86399);
                            $comp2 = intval($day / 86399);
                            if ($comp1 == $comp2){
                              $datas .= $element->views.',';
                              $found = TRUE;
                              break;
                            }
                          }

                          if (! $found){
                            $datas .= '0,';
                          }
                      }
                      $datas = trim($datas);
                      $labels = trim($labels);
                ?>
								<script>
										var lineChartData = {
											labels : <?php echo "[$labels]"?>,
											datasets : [
												{
													fillColor : "#fff",
													strokeColor : "#1ABC9C",
													pointColor : "#1ABC9C",
													pointStrokeColor : "#1ABC9C",
													data : <?php echo "[$datas]" ?>
												}
											]

										};
										new Chart(document.getElementById("line1").getContext("2d")).Line(lineChartData);
								</script>
	</div>
	<div class="clearfix"> </div>
  <div class="col-md-12">
    <p>Video Credentials</p>
              <table class="table table-bordered">
				<thead>
					<tr>
						<th width="50%">Classes</th>
						<th width="50%">Badges</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Title</td>
						<td><span class="badge badge-primary"><?php echo $video->title ?></span></td>
					</tr>
					<tr>
						<td><code>Uploaded</code></td>
						<td><span class="badge badge-primary"><?php echo date('F jS, Y h:i a', $video->upload_time) ?></span></td>
					</tr>
					<tr>
						<td><code>File size</code></td>
						<td><span class="badge badge-success"><?php echo size_word($video->filesize)?></span></td>
					</tr>
					<tr>
						<td><code>Views</code></td>
						<td><span class="badge badge-info"><?php echo $video->views ?></span></td>
					</tr>
					<tr>
						<td><code>Likes</code></td>
						<td><span class="badge badge-warning"><?php echo $video->likes ?></span></td>
					</tr>
				</tbody>
			  </table>
  </div>
</div>
