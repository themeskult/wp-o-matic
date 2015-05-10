<?php $this->adminHeader() ?>
        
  <div class="wrap">
                                          
    <div id="main">             
        <!-- <a href="<?php echo $this->helpurl ?>logging" class="help_link"><?php _e('Help', 'wpomatic') ?></a>                                                                         -->

      <p><?php _e('Welcome to WP-o-Matic Dashboard! This is the place where you can quickly watch WP-o-Matic activity, and keep track of your top campaigns and feeds.', 'wpomatic') ?></p>       
    
    <div class="clearfix">
      <div id="wpom-chart-dashboard"></div>

        <div class="wpom-box wpom-box-left">
              
          <h3>Next campaigns to process</h3>
          <?php if(count($nextcampaigns) == 0): ?>
          <p class="none"><?php _e('No campaigns to display', 'wpomatic') ?>
          <?php else: ?>
            <ol class="campaignlist">
              <?php foreach($nextcampaigns as $campaign): 
                $cl = $this->getCampaignRemaining($campaign);
                $cl = WPOTools::calcTime($cl, 0, 'd', false);
                
                $timestr = '';
                if($cl['days']) $timestr .= $cl['days'] . __('d', 'wpomatic') . ' ';
                if($cl['hours']) $timestr .= $cl['hours'] . __('h', 'wpomatic') . ' ';
                if($cl['minutes']) $timestr .= $cl['minutes'] . __('m', 'wpomatic') . ' ';      
                if($cl['seconds']) $timestr .= $cl['seconds'] . __('s', 'wpomatic');     
              ?>                         
              <li>
                <span class="details"><?php echo ($timestr) ? $timestr : __('Next!', 'wpomatic') ?></span>
                <a href="<?php echo $this->adminurl ?>&amp;s=list&amp;id=<?php echo $campaign->id ?>"><?php echo attribute_escape($campaign->title) ?></a></li>
              <?php endforeach; ?>  
            </ol>
          <?php endif; ?>

        </div>

        <div class="wpom-box">
              <h3>Latest processed campaigns</h3>
              <?php if(count($lastcampaigns) == 0): ?>
              <p class="none"><?php _e('No campaigns to display', 'wpomatic') ?>
              <?php else: ?>
                <ol class="campaignlist">
                  <?php foreach($lastcampaigns as $campaign): ?>                         
                  <li>
                    <span class="details"><?php echo WPOTools::timezoneMysql('F j, g:i a', $campaign->lastactive) ?></span>
                    <a href="<?php echo $this->adminurl ?>&amp;s=list&amp;id=<?php echo $campaign->id ?>"><?php echo attribute_escape($campaign->title) ?></a></li>
                  <?php endforeach; ?>  
                </ol>
              <?php endif; ?>
        </div>

  

        <hr />

        <div class="wpom-box wpom-box-left">
              <h3><?php echo _e('Your top campaigns', 'wpomatic') ?></h3>
              <?php if(count($campaigns) == 0): ?>
              <p class="none"><?php _e('No campaigns to display', 'wpomatic') ?></p>
              <?php else: ?>
              <ol class="campaignlist">
                <?php foreach($campaigns as $campaign): ?>                         
                <li>
                  <span class="details"><?php echo $campaign->count ?></span>
                  <a href="<?php echo $this->adminurl ?>&amp;s=list&amp;id=<?php echo $campaign->id ?>"><?php echo attribute_escape($campaign->title) ?></a></li>
                <?php endforeach; ?>  
              </ol>       
              <?php endif; ?>
        </div>

    
        <div class="wpom-box">
                <div class="wpom-sidebar">  
              <div id="sidebar_logging">                     
                <h3> <?php _e('Latest log entries', 'wpomatic') ?> <a style="float: right" href="<?php echo $this->adminurl ?>&amp;s=logs"><?php _e('(view all)', 'wpomatic')?></a></h3>
                <?php if(!$logs): ?>
                <p class="none"><?php echo _e('No actions to display', 'wpomatic') ?></p>
                <?php else: ?>
                <ul id="logs">
                  <?php foreach($logs as $log): ?>                         
                  <li><?php echo WPOTools::timezoneMysql('F j, g:i a', $log->created_on) . ' &mdash; <strong>' . attribute_escape($log->message) ?></strong></li>
                  <?php endforeach; ?>
                </ul>         
                <?php endif; ?>                                                                               

                <!-- <p id="log_status"><?php _e(sprintf('Logging is currently <strong>%s</strong>', __($logging ? 'enabled' : 'disabled')), 'wpomatic') ?> (<a title="<?php _e('We recommend keeping logging on only when experimenting with new feeds.', 'wpomatic') ?>" href="<?php echo $this->adminurl ?>&amp;s=options"><?php _e('change', 'wpomatic')?></a>).</p> -->
              </div>
              <!-- #sidebar_logging -->
            </div>  
            <!-- .wpom-sidebar -->
        </div>

        

    </div>
    <!-- .clearfix -->




    </div>
    <!-- #main -->
  </div>
  <!-- .wrap -->

<?php 
$date_from = date("Y, m, d",strtotime('one month ago'));
$date_to = date("Y, m, d",strtotime('today'));

?>
<script>
// jQuery(function ($) {
//    var chart;
//     $(document).ready(function() {
//         chart = new Highcharts.Chart({
//             chart: {
//                 renderTo: 'wpom-chart-dashboard',
//                 type: 'line',
//                 marginBottom: 40
//             },
//             title: {
//                 text: 'Post count last 30 days',
//                 x: -20 //center
//             },
//         xAxis: {
//             type: "datetime",
//             dateTimeLabelFormats: {
//                 day: '%m-%d'   
//             },
//             tickInterval: 24 * 3600 * 1000,
//     min: Date.UTC(<?php echo $date_from;?>),
//     max: Date.UTC(<?php echo $date_to;?>)
//         },
        
        
//         series: [{
//             data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
//             pointInterval: 24 * 3600 * 1000 // one day
//         }]
//         });
//     });
// });
</script>  
<?php $this->adminFooter() ?>