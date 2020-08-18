<div class='asked'>
    <?php echo isset($message) ? $message : NULL ?>
    <h3><a href="<?php echo site_url('home/add-video/'.$type) ?>" class="btn btn-primary"><?php echo $text ?></a></h3>
    <?php if(empty($videos)) : ?>
      <p style="margin:2em" class="alert alert-info">You have not uploaded any video. Click the <strong><em>New Series</em></strong> button to get going</p>
    <?php else : ?>
    <div class="tables">
    <table class="table">
      <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Start Year</th>
              <th>New</th>
            </tr>
      </thead>
      <tbody>
           <?php
                  $count = NULL;
                  foreach($videos as $video) : ?>
           <tr>
             <th scope="row"><?php echo ++$count ?></th>
             <td><a href="<?php echo site_url('home/video/series/'.$video->id) ?>" class="btn btn-link"><?php echo $video->title ?></a></td>
             <td><?php echo $video->start_year; ?></td>
             <td><a href="<?php echo site_url('home/add_video/4/'.$video->id) ?>" class="btn btn-xs btn-success">New Episode</a>|<a href="<?php echo site_url('home/new-season/'.$video->id) ?>" class="btn btn-xs btn-success">New Season</a></td>
           </tr>
         <?php endforeach; ?>
         </tbody>
    </table>
  </div>
  <?php endif; ?>
</div>
