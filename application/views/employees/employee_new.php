<?php $this->load->view('layout/header',array('title'=>$this->lang->line('New employee'),'forms'=>TRUE,'date_time'=>TRUE)) ?>
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
<div id="wrapper">
    <?php $this->load->view('layout/menu',array('active_menu'=>'employees_new'))?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('layout/page_header')?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $this->lang->line('New')?></h2>
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
                                    <input type="hidden" name="employee_id" id="employee_id" value="0">
                                        <div class="ibox-content no-padding border-left-right text-center">
                                            <a href="#" onclick="$('#employee_avatar').click();return false;">
                                                <img id="avatar_img" class="img-circle" src="images/no_avatar.jpg">
                                            </a>
                                            <input type="file" id="employee_avatar" name="employee_avatar" accept="image/*" class="hide">
                                            <br/><span class="badge badge-success m-t-xs"><?= $this->lang->line('Active')?></span>
                                        </div>
                                        <div class="ibox-content profile-content">
                                            <div class="form-group has-feedback">
                                                <label for="employee_name" class="control-label"><?= $this->lang->line('Name')?><sup class="mandatory">*</sup></label>
                                                <input type="text" name="employee_name" id="employee_name" class="form-control required" maxlength="100">
                                            </div>
                                            <div class="form-group has-feedback">
                                                <label for="employee_email" class="control-label"><?= $this->lang->line('Email')?><sup class="mandatory">*</sup></label>
                                                <input type="email" name="employee_email" id="employee_email" class="form-control required email" maxlength="100">
                                            </div>
                                            <div class="form-group">
                                                <label for="birth_date" class="control-label"><?= $this->lang->line('Birth date')?></label>
                                                <input type="text" name="birth_date" id="birth_date" class="form-control datetimepicker" data-date-format="<?= $this->config->item('js_month_format')?>">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="control-label"><?= $this->lang->line('Gender')?></label>
                                                <input type="hidden" name="employee_gender" id="employee_gender" value="male">
                                                <div class="btn-group" data-toggle="buttons">
                                                    <button type="button" class="btn btn-circle btn-primary active" gender="male"><i class="fa fa-male" style="font-size: 19px;"></i></button>
                                                    <button type="button" class="btn btn-circle " gender="female"><i class="fa fa-female" style="font-size: 19px;"></i></button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="employee_ssn" class="control-label"><?= $this->lang->line('SSN')?></label>
                                                    <input type="text" name="employee_ssn" id="employee_ssn" class="form-control">
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <button type="button" class="btn btn-primary pull-right" onclick="submit_form('#save_details')">
                                                <i class="fa fa-save"></i>
                                                <?= $this->lang->line('Save')?>
                                            </button>
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
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Education')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_education" style="display: none;">
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Positions')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_positions" style="display: none;">
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Skills')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_skills" style="display: none;">
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Employment')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_employment" style="display: none;">
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Family')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_family" style="display: none;">
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
                            </div>
                            
                            <div class="ibox float-e-margins">
                                <div class="ibox-title collapse-link">
                                    <h5><?= $this->lang->line('Licenses')?></h5>
                                </div>
                                <div class="ibox-content" id="employees_licenses" style="display: none;">
                                    <?php $this->load->view('layout/info',array('message'=>$this->lang->line('Save employee to enable this tab')))?>
                                </div>
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