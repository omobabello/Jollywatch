<div class='asked'>
    <?php echo isset($message) ? $message : NULL ?>
    <?php if(empty($videos)) : ?>
      <p style='margin:2em' class="alert alert-info">You have not uploaded any video. Click the <strong><em><?php echo $text ?></em></strong> button to get going</p>
    <?php else : ?>
  <div class="tables">
    <table class="table">
      <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Date Uploaded</th>
              <th>Video Type</th>
              <th>Subscribers</th>
              <th>Anonymous</th>
              <th>Total views</th>
            </tr>
      </thead>
      <tbody>
           <?php
                  $count = $this->uri->segment(3);
                  foreach($videos as $video): ?>
           <tr>
             <th scope="row"><?php echo ++$count ?></th>
             <td><a href="<?php echo site_url('home/video/'.$video->type.'/'.$video->id) ?>" class="btn btn-link"><?php echo $video->title ?></a></td>
             <td><?php echo date("F jS, Y",$video->upload_time); ?></td>
             <td><?php echo strtoupper($video->type); ?></td>
             <td><?php echo $video->sub_views ?></td>
             <td><?php echo $video->anon_views ?></td>
             <td><?php echo $video->total_views ?></td>
           </tr>
         <?php endforeach; ?>
         </tbody>
    </table>
    </div>
  <?php endif; ?>
        <?php echo $pagination ?>
</div>
