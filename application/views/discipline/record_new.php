<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Discipline'),'forms'=>TRUE,'tables'=>TRUE,'date_time'=>TRUE,'magicsuggest'=>TRUE)) ?>
<script>
    $('document').ready(function(){
        $('.datetimepicker').datetimepicker({pickTime: false});
        $('#employee_id').magicSuggest({
            allowFreeEntries:false,
            data:'discipline/find_employee',
            maxSelection:1
        });
    })
</script>
<div id="wrapper">  
    <?php $this->load->view('layout/menu',array('active_menu'=>'discipline_new'))?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('layout/page_header')?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $this->lang->line('New record')?></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard"><?= $this->lang->line('Home')?></a>
                    </li>
                    <li>
                        <?= $this->lang->line('Discipline')?>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <button class="btn btn-primary" onclick="submit_form('#save_record')">
                        <i class="fa fa-plus-circle"></i>
                        <?= $this->lang->line('Save')?>
                    </button>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInDown">
                    <div class="ibox-content">
                        <div class="row">
                            <div id="save_result"></div>
                            <div class="col-lg-9">
                                <form action="discipline/save_record" method="POST" id="save_record">
                                    <input type="hidden" name="record_id" id="record_id" value="0">
                                    <div class="form-group has-feedback" id="employee_id_area">
                                        <label for="employee_id" class="control-label"><?= $this->lang->line('Employee')?><sup class="mandatory">*</sup></label>
                                        <input type="text" name="employee_id" id="employee_id" class="form-control required">
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="headline" class="control-label"><?= $this->lang->line('Headline')?><sup class="mandatory">*</sup></label>
                                        <input type="text" name="headline" id="headline" class="form-control required">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-6" style="padding-left: 0;">
                                        <div class="form-group has-feedback">
                                            <label for="date" class="control-label"><?= $this->lang->line('Date')?><sup class="mandatory">*</sup></label>
                                            <input type="text" name="date" id="date" class="form-control required datetimepicker" data-date-format="<?= $this->config->item('js_month_format')?>">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group has-feedback">
                                        <label for="description" class="control-label"><?= $this->lang->line('Description')?><sup class="mandatory">*</sup></label>
                                        <textarea rows="5" class="form-control required" name="description" id="description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="taken_actions" class="control-label"><?= $this->lang->line('Taken actions')?></label>
                                        <textarea rows="5" class="form-control" name="taken_actions" id="taken_actions"></textarea>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<?php $this->load->view('layout/footer')?>