<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Company'),'forms'=>TRUE)) ?>
<div id="wrapper">
    <?php $this->load->view('layout/menu',array('active_menu'=>'company_settings'))?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('layout/page_header')?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $this->lang->line('Company')?></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard"><?= $this->lang->line('Home')?></a>
                    </li>
                    <li>
                        <a><?= $this->lang->line('Settings')?></a>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <button type="button" class="btn btn-primary" onclick="submit_form('#save_company')">
                        <i class="fa fa-save"></i>
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
                            <form role="form" action="settings/save_company" method="POST" id="save_company">
                                <div id="save_result"></div>
                                <div class="col-lg-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="company_name"><?= $this->lang->line('Name')?><sup class="mandatory">*</sup></label>
                                        <input type="text" class="form-control required" name="company_name" id="company_name" maxlength="200" value="<?= $details['company_name']?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group has-feedback">
                                        <label class="control-label" for="company_email"><?= $this->lang->line('Email')?><sup class="mandatory">*</sup></label>
                                        <input type="email" class="form-control required email" name="company_email" id="company_email" maxlength="50" value="<?= $details['company_email']?>">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" for="company_phone"><?= $this->lang->line('Phone')?></label>
                                    <input type="tel" class="form-control" name="company_phone" id="company_phone" maxlength="50" value="<?= $details['company_phone']?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" for="company_address"><?= $this->lang->line('Address')?></label>
                                    <input type="text" class="form-control" name="company_address" id="company_address" maxlength="100" value="<?= $details['company_address']?>">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group col-lg-6">
                                    <label class="control-label" for="company_city"><?= $this->lang->line('City')?></label>
                                    <input type="text" class="form-control" name="company_city" id="company_city" maxlength="100" value="<?= $details['company_city']?>">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label class="control-label" for="company_state"><?= $this->lang->line('State')?></label>
                                    <input type="text" class="form-control" name="company_state" id="company_state" maxlength="50" value="<?= $details['company_state']?>">
                                </div>
                                <div class="form-group col-lg-2">
                                    <label class="control-label" for="company_zip"><?= $this->lang->line('Zip')?></label>
                                    <input type="text" class="form-control" name="company_zip" id="company_zip" maxlength="50" value="<?= $details['company_zip']?>">
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer')?>