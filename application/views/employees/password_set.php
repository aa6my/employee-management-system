<script>
    $('document').ready(function(){
        init_icheck();
    })
</script>
<div class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $this->lang->line('Close')?></span></button>
                <h4 class="modal-title"><?= $this->lang->line('Access')?></h4>
            </div>
            <div class="modal-body">
                <div id="save_result2"></div>
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#password_tab" data-toggle="tab"><?= $this->lang->line('New password')?></a></li>
                    <li><a href="#permissions_tab" data-toggle="tab"><?= $this->lang->line('Permissions')?></a></li>
                </ul>
                
                <form action="employees/save_password" method="POST" id="save_password">
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="password_tab">
                            <input type="hidden" id="employee_id" name="employee_id" value="<?= $employee_id?>">
                            <div class="form-group has-feedback">
                                <label for="new_password" class="control-label"><?= $this->lang->line('New password')?></label>
                                <input type="password" name="new_password" id="new_password" class="form-control">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="password_again" class="control-label"><?= $this->lang->line('Password again')?></label>
                                <input type="password" name="password_again" id="password_again" class="form-control" equalTo="#new_password">
                            </div>
                            <div class="form-group">
                                <div class="checkbox i-checks m-b-none">
                                    <input type="checkbox" name="is_active" id="is_active" <?= ($is_active)?'checked="checked"':''?> class="i-checks">
                                    <label for="is_active" class="control-label"><?= $this->lang->line('Is active')?></label>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="permissions_tab">
                            <ul class="unstyled no-padding m-t-sm">
                            <?php foreach($this->config->item('possible_permissions') as $index=>$permission){?>
                            <li>
                                <div class="checkbox i-checks m-b-none">
                                    <input type="checkbox" name="permissions[<?= $permission?>]" id="permission_<?= $index?>" <?= (isset($permissions[$permission]))?'checked="checked"':''?> class="i-checks">
                                    <label for="permission_<?= $index?>" class="control-label"><?= $this->lang->line(ucfirst($permission))?></label>
                                </div>
                            </li>
                            <?php }?>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('Close')?></button>
                <button type="button" class="btn btn-primary" onclick="submit_form('#save_password','#save_result2')"><?= $this->lang->line('Save')?></button>
            </div>
        </div>
    </div>
</div>