<?php
//This is a sample page showing how to create a custom report
//We can get access to all the framework, so you can do anything with the instance of the current controller ($this)

//You can load a language file so as to translate the report if the strings are available
//It can be useful for date formating
$this->lang->load('requests', $this->language);
$this->lang->load('global', $this->language);


?>

<h2>All Leave Requests</h2>

<?php
//$this is the instance of the current controller, so you can use it for direct access to the database
$this->db->select('users.firstname, users.lastname, leaves.*');
$this->db->select('status.name as status_name, types.name as type_name');
$this->db->from('leaves');
$this->db->join('status', 'leaves.status = status.id');
$this->db->join('types', 'leaves.type = types.id');
$this->db->join('users', 'leaves.employee = users.id');
if (is_null($this->input->get('viz_startdate', TRUE))) {
    $this->db->where('WEEK(row_create_date) = WEEK(CURDATE())');
} else{
    $this->db->where('row_create_date between ' . $this->db->escape($this->input->get('viz_startdate', TRUE)). ' and '.$this->db->escape($this->input->get('viz_enddate', TRUE)));
}
$this->db->order_by('users.lastname, users.firstname, leaves.startdate', 'desc');
$rows = $this->db->get()->result_array();
//echo $this->db->last_query();  
?>

<div class="row-fluid">
    <form action="<?php echo base_url();?>all-leave-requests" method="GET">
                

                <label for="viz_startdate">Submission Start Date</label>
                <input type="text" name="viz_startdate" id="viz_startdate" value="<?php echo $this->input->get('viz_startdate', TRUE);?>" autocomplete="off" />
                <input type="hidden" name="startdate" id="startdate" />
                <br />

                <label for="viz_enddate">Submission End Date</label>
                <input type="text" name="viz_enddate" id="viz_enddate" value="<?php echo $this->input->get('viz_enddate', TRUE);?>" autocomplete="off" />
                <input type="hidden" name="enddate" id="enddate" />
                <br />


               
                <button type="submit" id="cmdSubmit" class="btn btn-primary">Execute</button>
                <a href="#" id="tipReload" data-toggle="tooltip" title="Don't forget to reload the report" data-placement="right" data-container="#cmdSubmit"></a>
        </form>
    <div class="span12">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr>
                    <th>Action</th>
                    <th><?php echo lang('requests_index_thead_fullname');?></th>
                    <th><?php echo lang('requests_index_thead_startdate');?></th>
                    <th><?php echo lang('requests_index_thead_enddate');?></th> 
                    <th>Submit Date</th>           
                    <th><?php echo lang('requests_index_thead_duration');?></th>
                    <th><?php echo lang('requests_index_thead_type');?></th>
                    <th><?php echo lang('requests_index_thead_status');?></th>
                </tr>
            </thead>
                  <tbody>
<?php foreach ($rows as $row) {
    $date = new DateTime($row['startdate']);
    $startdate = $date->format(lang('global_date_format'));
    $date = new DateTime($row['enddate']);
    $enddate = $date->format(lang('global_date_format'));

    $submitdate = $row['row_create_date'];?>
<tr>
    <td><a href="leaves/edit/<?php echo $row['id'];?>?source=hr%2Fleaves%2F1" target="_blank">Edit</a></td>
    <td><a href="hr/counters/employees/<?php echo $row['employee'];?>" target="_blank"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></a></td>
    <td><?php echo $startdate . ' (' . lang($row['startdatetype']). ')'; ?></td>
    <td><?php echo $enddate . ' (' . lang($row['enddatetype']) . ')'; ?></td>
    <td><?php echo $submitdate; ?></td>
    <td><?php echo $row['duration']; ?></td>
    <td><?php echo $row['type_name']; ?></td>
    <td><?php echo lang($row['status_name']); ?></td>
</tr>
<?php } ?>
                  </tbody>
            </table>
    </div>
</div>

<a href="<?php echo base_url() . 'excel-export-all-leave-requests'; ?>" class="btn btn-primary"><i class="mdi mdi-download"></i>&nbsp; <?php echo lang('requests_index_button_export');?></a>

<div class="row-fluid"><div class="span12">&nbsp;</div></div>



<link rel="stylesheet" href="<?php echo base_url();?>assets/css/flick/jquery-ui.custom.min.css">
<script src="<?php echo base_url();?>assets/js/jquery-ui.custom.min.js"></script>


<script src="<?php echo base_url();?>assets/js/i18n/jquery.ui.datepicker-en-GB.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/moment-with-locales.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/select2-4.0.5/css/select2.min.css">
<script src="<?php echo base_url();?>assets/select2-4.0.5/js/select2.full.min.js"></script>

<?php require_once dirname(BASEPATH) . "/local/triggers/leave_view.php"; ?>
<script>
$(document).on("click", "#showNoneWorkedDay", function(e) {
  showListDayOffHTML();
});
</script>
<script type="text/javascript">
    var baseURL = '<?php echo base_url();?>';
    var userId = <?php echo $user_id; ?>;
    var leaveId = null;
    var languageCode = '<?php echo $language_code;?>';
    var dateJsFormat = 'yy-mm-dd';
    var dateMomentJsFormat = 'YYYY-MM-DD';

function validate_form() {
    var fieldname = "";

    //Call custom trigger defined into local/triggers/leave.js
    if (typeof triggerValidateCreateForm == 'function') {
       if (triggerValidateCreateForm() == false) return false;
    }

    if ($('#viz_startdate').val() == "") fieldname = "Start Date";
    if ($('#viz_enddate').val() == "") fieldname = "End Date";
    
   
}


</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/lms/leave.edit-0.7.0.js" type="text/javascript"></script>
