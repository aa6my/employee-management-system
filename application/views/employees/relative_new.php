<script>
    $('document').ready(function(){
        $('.datetimepicker').datetimepicker({pickTime: false});
    })
</script>
<div class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $this->lang->line('Close')?></span></button>
                <h4 class="modal-title"><?= $this->lang->line('Relative')?></h4>
            </div>
            <div class="modal-body">
                <form action="employees/save_relative" method="POST" id="save_relative">
                    <div id="save_result2"></div>
                    <input type="hidden" id="relative_id" name="relative_id" value="0" class="education_id">
                    <input type="hidden" id="employee_id" name="employee_id" value="<?= $employee_id?>">
                    <div class="form-group has-feedback">
                        <label for="relative_name" class="control-label"><?= $this->lang->line('Name')?><sup class="mandatory">*</sup></label>
                        <input type="text" name="relative_name" id="relative_name" class="form-control required" maxlength="100">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-lg-6" style="padding-left: 0;">
                        <div class="form-group">
                            <label for="birht_date" class="control-label"><?= $this->lang->line('Birht date')?></label>
                            <input type="text" name="birht_date" id="birht_date" class="form-control datetimepicker" data-date-format="<?= $this->config->item('js_month_format')?>">
                        </div>
                    </div>
                    <div class="col-lg-6" style="padding-left: 0;">
                        <div class="form-group">
                            <label for="relative_type" class="control-label"><?= $this->lang->line('Type')?></label>
                            <select name="relative_type" id="relative_type" class="form-control">
                                <option value="child"><?= $this->lang->line('Child')?></option>                
                                <option value="partner"><?= $this->lang->line('Husband/ Wife')?></option>                
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <?php $this->load->view('mix/attachments_list',array('attachments'=>array()))?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('Close')?></button>
                <button type="button" class="btn btn-primary" onclick="submit_form('#save_relative','#save_result2')"><?= $this->lang->line('Save')?></button>
            </div>
        </div>
    </div>
</div>