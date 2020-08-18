<div class='asked'>
    <?php echo isset($message) ? $message : NULL ?>
    <h3><a href="<?php echo site_url('home/add-video/'.$type) ?>" class="btn btn-primary"><?php echo $text ?></a></h3>
    <?php if(empty($videos)) : ?>
      <p style='margin:2em' class="alert alert-info">You have not uploaded any video. Click the <strong><em><?php echo $text ?></em></strong> button to get going</p>
    <?php else : ?>
  <div class="tables">
    <table class="table">
      <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <?php if (isset($videos[0]->description)) : ?>
                <th>Description</th>
              <?php else:  ?>
                  <th>Episode Number</th>
              <?php endif; ?>
              <th>Status</th>
              <th>Views <i class='fa fa-eye'></i></th>
              <th>Uploaded</th>
            </tr>
      </thead>
      <tbody>
           <?php
                  $count = NULL;
                  foreach($videos as $video): ?>
           <tr>
             <th scope="row"><?php echo ++$count ?></th>
             <td><a href="<?php echo site_url('home/video/'.$video->tbl.'/'.$video->id) ?>" class="btn btn-link"><?php echo $video->title ?></a></td>
            <?php if (isset($video->description)) : ?>
              <td><?php echo (strlen($video->description) > 50) ? substr($video->description,0,50)."..." : $video->description; ?></td>
            <?php else:  ?>
                <td><?php echo $video->season * 100 + $video->episode?></td>
           <?php endif; ?>
             <td><?php echo ($video->approved) ?  "<span class='label label-success'>Approved</span>" :
                                                  "<span class='label label-danger'>Not Approved</span>"?></td>
             <td><?php echo $video->views ?></td>
             <td><?php echo time_elapsed($video->upload_time); ?></td>
           </tr>
         <?php endforeach; ?>
         </tbody>
    </table>
    </div>
  <?php endif; ?>

</div>
