<?php
/**
 * This view displays the profile (basic information) of the connected user.
 * If ICS feed is activated, a link allows the user to import non-working days into a remote calendar application.
 * @copyright  Copyright (c) 2014-2018 Benjamin BALET
 * @license      http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link            https://github.com/bbalet/jorani
 * @since         0.3.0
 */
?>

<div class="row-fluid">
    <div class="span6">
        <h2><?php echo 'My Personal Info';?></h2>
        <div class="row-fluid">
            <div class="span6"><strong><?php echo "Employee Name";?></strong></div>
            <div class="span6"><?php echo $user['firstname'];?></div>
        </div>

        <div class="row-fluid">
            <div class="span6"><strong><?php echo lang('users_myprofile_field_manager');?></strong></div>
            <div class="span6"><?php echo $manager_label;?></div>
        </div>

        <div class="row-fluid">
            <div class="span6"><strong><?php echo lang('users_myprofile_field_contract');?></strong></div>
            <div class="span6"><?php echo $contract_label;?>
            </div>
        </div>

        <div class="row-fluid">
            <div class="span6"><strong><?php echo lang('users_myprofile_field_position');?></strong></div>
            <div class="span6"><?php echo $position_label;?></div>
        </div>

        <div class="row-fluid">
            <div class="span6"><strong><?php echo "Department / Division";?></strong></div>
            <div class="span6"><?php echo $organization_label;?></div>
        </div>

        <div class="row-fluid">
            <div class="span6"><strong><?php echo "HR ID";?></strong></div>
            <div class="span6"><?php echo $user['identifier'];?></div>
        </div>

        
    </div>
    
</div>

<div class="row-fluid"><div class="span12">&nbsp;</div></div>



<link rel="stylesheet" href="<?php echo base_url();?>assets/select2-4.0.5/css/select2.min.css">
<script src="<?php echo base_url();?>assets/select2-4.0.5/js/select2.full.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/js.state-2.2.0.min.js"></script>
<script src="<?php echo base_url();?>assets/js/clipboard-1.6.1.min.js"></script>
<script type="text/javascript">
$(function() {
    //Copy/Paste ICS Feed
    var client = new Clipboard("#cmdCopy");
    $('#lnkICS').click(function () {
        $("#frmLinkICS").modal('show');
    });
    client.on( "success", function() {
        $('#tipCopied').tooltip('show');
        setTimeout(function() {$('#tipCopied').tooltip('hide')}, 1000);
    });

    //Refresh page language
    $('#language').select2();
    $('#language').on('select2:select', function (e) {
      var value = e.params.data.id;
      Cookies.set('language', value, { expires: 90, path: '/'});
      window.location.href = '<?php echo base_url();?>session/language?language=' + value;
    });
});
</script>
