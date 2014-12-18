<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Edit employee'),'forms'=>TRUE,'date_time'=>TRUE,'icheck'=>TRUE)) ?>
<script>
    $('document').ready(function(){
        $('.btn-group button').click(function(){
            $('.btn-group button').removeClass('active btn-primary');
            $(this).addClass('active btn-primary');
            $("#employee_gender").val($(this).attr('gender'));
        })
        
        $("#employee_avatar").change(function(){
           $("#save_result").html('<div class="alert alert-success"><a class="close" data-dismiss="alert" href="#">&times;</a><?= $this->lang->line('Press Save button and photo will be updated')?></div>');
        })
        
        $('.datetimepicker').datetimepicker({pickTime: false});
    })
</script>
<?php $this->load->view('mix/attachment_remove')?>
<div id="wrapper">
    <?php $this->load->view('layout/menu',array('active_menu'=>'employees'))?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('layout/page_header')?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $this->lang->line('Edit')?></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard"><?= $this->lang->line('Home')?></a>
                    </li>
                    <li>
                        <?= $this->lang->line('Employees')?>
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInDown">
                    <div class="row">
                        <div id="save_result"></div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5><?= $this->lang->line('Details')?></h5>
                                </div>
                                <div>
                                    <form action="employees/save_employee" id="save_details" method="POST" role="form">
                                    <input type="hidden" name="employee_id" id="employee_id" value="<?= $employee['employee_id']?>">
                                        <div class="ibox-content no-padding border-left-right text-center">
                                            <a href="#" onclick="$('#employee_avatar').click();return false;">
                                                <img id="avatar_img" class="img-circle" src="<?= $employee['avatar']?>">
                                            </a>
                                            <input type="file" id="employee_avatar" name="employee_avatar" accept="image/*" class="hide">
                                            <br/><span class="badge badge-success m-t-xs" id="employee_status"><?= $this->lang->line($employee['status'])?></span>
                                        </div>
                                        <div class="ibox-content profile-content">
                                            <div class="form-group has-feedback">
                                                <label for="employee_name" class="control-label"><?= $this->lang->line('Name')?><sup class="mandatory">*</sup></label>
                                                <input type="text" name="employee_name" id="employee_name" class="form-control required" maxlength="100" value="<?= $employee['name']?>">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="employee_email" class="control-label"><?= $this->lang->line('Email')?><sup class="mandatory">*</sup></label>
                                                <input type="email" name="employee_email" id="employee_email" class="form-control required email" maxlength="100" value="<?= $employee['email']?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="birth_date" class="control-label"><?= $this->lang->line('Birth date')?></label>
                                                <input type="text" name="birth_date" id="birth_date" class="form-control datetimepicker" value="<?= ($employee['birth_date'])?date($this->config->item('date_format'),strtotime($employee['birth_date'])):''?>" data-date-format="<?= $this->config->item('js_month_format')?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="control-label"><?= $this->lang->line('Gender')?></label>
                                                <input type="hidden" name="employee_gender" id="employee_gender" value="<?= $employee['gender']?>">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <button type="button" class="btn btn-circle <?= ($employee['gender']=='male')?'btn-primary active':''?>" gender="male"><i class="fa fa-male" style="font-size: 19px;"></i></button>
                                                    <button type="button" class="btn btn-circle <?= ($employee['gender']=='female')?'btn-primary active':''?>" gender="female"><i class="fa fa-female" style="font-size: 19px;"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="employee_ssn" class="control-label"><?= $this->lang->line('SSN')?></label>
                                                    <input type="text" name="employee_ssn" id="employee_ssn" class="form-control" value="<?= $employee['ssn']?>">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <button type="button" class="btn btn-primary pull-right" onclick="submit_form('#save_details')">
                                                <i class="fa fa-save"></i>
                                                <?= $this->lang->line('Save')?>
                                            </button>
                                            <?php if (($employee['employee_id']!='1') AND ($this->user_actions->is_allowed('admin'))){?>
                                            <a href="employees/set_password/<?= $employee['employee_id']?>" class="pull-right m-r-sm m-t-sm" data-target="#modal_window" data-toggle="modal"><?= $this->lang->line('Access')?></a>
                                            <?php }?>
                                            <div class="clearfix"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Address')?></h5>
                                </div>
                                <div class="ibox-content" style="display: none;">
                                    <form action="employees/save_address" id="save_address" method="POST" role="form">
                                        <input type="hidden" name="employee_id" id="employee_id" value="<?= $employee['employee_id']?>">
                                        <div class="form-group">
                                            <label for="employee_address" class="control-label"><?= $this->lang->line('Address')?></label>
                                            <input type="text" name="employee_address" id="employee_address" class="form-control" value="<?= $employee['ssn']?>" maxlength="100">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-5 form-group" style="padding-left: 0;">
                                            <label for="employee_city" class="control-label"><?= $this->lang->line('City')?></label>
                                            <input type="text" name="employee_city" id="employee_city" class="form-control" value="<?= $employee['city']?>" maxlength="100">
                                        </div>
                                        <div class="col-lg-4 form-group" style="padding-left: 0;">
                                            <label for="employee_state" class="control-label"><?= $this->lang->line('State')?></label>
                                            <input type="text" name="employee_state" id="employee_state" class="form-control" value="<?= $employee['state']?>" maxlength="100">
                                        </div>
                                        <div class="col-lg-3 form-group" style="padding-left: 0;">
                                            <label for="employee_zip" class="control-label"><?= $this->lang->line('Zip')?></label>
                                            <input type="text" name="employee_zip" id="employee_zip" class="form-control" value="<?= $employee['zip_code']?>" maxlength="10">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-6 form-group" style="padding-left: 0;">
                                            <label for="employee_phone" class="control-label"><?= $this->lang->line('Phone')?></label>
                                            <input type="tel" name="employee_phone" id="employee_phone" class="form-control" value="<?= $employee['phone']?>" maxlength="100">
                                        </div>
                                        <div class="col-lg-6 form-group" style="padding-left: 0;">
                                            <label for="employee_cell_phone" class="control-label"><?= $this->lang->line('Cell')?></label>
                                            <input type="text" name="employee_cell_phone" id="employee_cell_phone" class="form-control" value="<?= $employee['cell_phone']?>" maxlength="100">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12 form-group" style="padding-left: 0;">
                                            <label for="contacts" class="control-label"><?= $this->lang->line('Emergency contacts')?></label>
                                            <textarea rows="4" name="contacts" id="contacts" class="form-control"></textarea>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="button" class="btn btn-primary pull-right" onclick="submit_form('#save_address')">
                                            <i class="fa fa-save"></i>
                                            <?= $this->lang->line('Save')?>
                                        </button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <a class="pull-right btn btn-primary btn-sm m-t-sm m-r-sm" href="employees/new_education/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                    <i class="fa fa-plus-circle"></i>
                                    <?= $this->lang->line('Add')?>
                                </a>
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Education')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_education" style="display: none;" ajax_link="employees/education/<?= $employee['employee_id']?>"></div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <?php if ($employee['status']=='Active'){?>
                                <div class="btn-group pull-right m-t-sm m-r-sm" id="position_actions">
                                    <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                                        <span class="fa fa-list"></span>
                                        <?= $this->lang->line('Actions')?>
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="employees/new_position/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                                <i class="fa fa-plus-circle"></i>
                                                <?= $this->lang->line('Add')?>
                                            </a>
                                        </li>    
                                        <li>
                                            <a href="employees/resign/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                                <i class="fa fa-external-link"></i>
                                                <?= $this->lang->line('Resign')?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php }?>
                                
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Positions')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_positions" style="display: none;" ajax_link="employees/positions/<?= $employee['employee_id']?>"></div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <a class="pull-right btn btn-primary btn-sm m-t-sm m-r-sm" href="employees/edit_skills/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                    <i class="fa fa-edit"></i>
                                    <?= $this->lang->line('Edit')?>
                                </a>
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Skills')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_skills" style="display: none;" ajax_link="employees/skills/<?= $employee['employee_id']?>"></div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <a class="pull-right btn btn-primary btn-sm m-t-sm m-r-sm" href="employees/new_employment/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                    <i class="fa fa-plus-circle"></i>
                                    <?= $this->lang->line('Add')?>
                                </a>
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Employment')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_employment" style="display: none;" ajax_link="employees/employment/<?= $employee['employee_id']?>"></div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <a class="pull-right btn btn-primary btn-sm m-t-sm m-r-sm" href="employees/new_relative/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                    <i class="fa fa-plus-circle"></i>
                                    <?= $this->lang->line('Add')?>
                                </a>
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Family')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_family" style="display: none;" ajax_link="employees/relatives/<?= $employee['employee_id']?>"></div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <a class="pull-right btn btn-primary btn-sm m-t-sm m-r-sm" href="employees/new_license/<?= $employee['employee_id']?>" data-target="#modal_window" data-toggle="modal">
                                    <i class="fa fa-plus-circle"></i>
                                    <?= $this->lang->line('Add')?>
                                </a>
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Licenses')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_licenses" style="display: none;" ajax_link="employees/licenses/<?= $employee['employee_id']?>"></div>
                            </div>
                            
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer')?>