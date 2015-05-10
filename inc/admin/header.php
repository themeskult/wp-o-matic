<div id="wpomain">
    <div class="wrap">
        <div id="icon-options-general" class="icon32"></div>
        <h2>wp-o-matic <a href="<?php echo $this->adminurl ?>&amp;s=add" class="add-new-h2">Add New Campaign</a></h2>
    </div>

    <h2 class="nav-tab-wrapper">
        <a <?php echo $current['home'] ?> id="menu_home" href="<?php echo $this->adminurl ?>&amp;s=home"><?php _e('Dashboard', 'wpomatic') ?></a>
        <a  <?php echo $current['list'] ?> id="menu_list" href="<?php echo $this->adminurl ?>&amp;s=list"><?php _e('Campaigns', 'wpomatic') ?></a>
        <a <?php echo $current['options'] ?> id="menu_options" href="<?php echo $this->adminurl ?>&amp;s=options"><?php _e('Options', 'wpomatic') ?></a>
        <a <?php echo $current['import'] ?> id="menu_backup" href="<?php echo $this->adminurl ?>&amp;s=import"><?php _e('Import', 'wpomatic') ?></a>
        <a <?php echo $current['export'] ?> id="menu_backup" href="<?php echo $this->adminurl ?>&amp;s=export"><?php _e('Export', 'wpomatic') ?></a>
    </h2>

    <div id="wpocontent">
