<script src="<?php echo assets_url('js/pie-chart.js') ?>" type="text/javascript"></script>
<div class='blank'>
  <div class="col-md-4">
    <?php if ($has_movies) : ?>
    <div class="content-top-1">
      <div class="col-md-8 top-content">
					<h5>Movies Uploaded</h5>
					<label><?php echo size_word($movie_size)?></label>
				</div>
				<div class="col-md-4 top-content1">
					<div id="demo-pie-1" class="pie-title-center" data-percent="<?php echo round($movie_size/ $limit * 100, 5)?>"> <span class="pie-value"></span> </div>
				</div>
				 <div class="clearfix"> </div>
    </div>
  <?php endif; ?>
  <?php if($has_skits) :  ?>
    <div class="content-top-1">
      <div class="col-md-8 top-content">
					<h5>Skits Uploaded</h5>
					<label><?php echo size_word($skits_size)?></label>
				</div>
				<div class="col-md-4 top-content1">
					<div id="demo-pie-2" class="pie-title-center" data-percent="<?php echo round($skits_size/ $limit * 100, 5)?>"> <span class="pie-value"></span> </div>
				</div>
				 <div class="clearfix"> </div>
    </div>
  <?php endif ?>
  <?php if($has_series) : ?>
    <div class="content-top-1 ">
      <div class="col-md-8 top-content">
					<h5>Episodes Uploaded</h5>
					<label><?php echo size_word($epi_size)?></label>
				</div>
				<div class="col-md-4 top-content1">
					<div id="demo-pie-3" class="pie-title-center" data-percent="<?php echo round($epi_size/ $limit * 100, 5)?>"> <span class="pie-value"></span> </div>
				</div>
				 <div class="clearfix"> </div>
    </div>
  <?php endif; ?>
  </div>
  <div class="col-md-8">
     <div class="list-group list-group-alternate">
				<a href="#" class="list-group-item"><span class="badge">201</span> <i class="ti ti-email"></i> Amount Made </a>
				<a href="<?php //echo site_url("home/video/{$most_viewed->type}/$most_viewed->id")?>" class="list-group-item"><span class="badge badge-primary"><?php //echo $most_viewed->title ?></span> <i class="ti ti-eye"></i> Most Viewed </a>
				<a href="<?php echo site_url("home/video/{$most_liked->type}/$most_liked->id")?>" class="list-group-item"><span class="badge"><?php echo $most_liked->title ?></span> <i class="ti ti-headphone-alt"></i> Most Liked </a>
				<a href="#" class="list-group-item"><span class="badge"><?php echo size_word($data_consumed) ?></span> <i class="ti ti-comments"></i> Total Memory Consumed </a>
				<a href="#" class="list-group-item"><span class="badge badge-danger"><?php echo $movies + $episodes + $skits?></span> <i class="ti ti-bell"></i> Total Videos uploaded </a>
        <?php if($has_movies) : ?>
          <a href="<?php echo site_url('home/my_videos/1') ?>" class="list-group-item"><span class="badge badge-warning"><?php echo $movies ?></span> <i class="ti ti-bookmark"></i> Total Movies uploaded </a>
        <?php endif; ?>
        <?php if($has_series) : ?>
          <a href="<?php echo site_url('home/my_videos/2') ?>" class="list-group-item"><span class="badge badge-warning"><?php echo $episodes ?></span> <i class="ti ti-bookmark"></i> Total Episodes uploaded </a>
        <?php endif; ?>
        <?php if($has_skits) : ?>
          <a href="<?php echo site_url('home/my_videos/3') ?>" class="list-group-item"><span class="badge badge-warning"><?php echo $skits ?></span> <i class="ti ti-bookmark"></i> Total Skits uploaded </a>
        <?php endif; ?>
			</div>
  </div>
</div>
