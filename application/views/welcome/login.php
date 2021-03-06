<?php $this->load->view('layout/header',array('title'=>$this->lang->line(isset($code)?'New password':'Login'),'forms'=>TRUE))?>
<?php if (isset($code)){?>
<script>
    $('document').ready(function(){
        $('#new_password_window').modal('show');
    })
</script>
<div class="modal" tabindex="-1" role="dialog" aria-hidden="true" id="new_password_window">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $this->lang->line('Close')?></span></button>
                <h4 class="modal-title"><?= $this->lang->line('New password')?></h4>
            </div>
            <div class="modal-body">
                <form action="welcome/new_password" method="POST" id="new_password_form">
                    <div id="save_result2"></div>
                    <input type="hidden" id="code" name="code" value="<?= $code?>">
                    <div class="form-group has-feedback">
                        <label for="new_password" class="control-label"><?= $this->lang->line('New password')?><sup class="mandatory">*</sup></label>
                        <input type="password" name="new_password" id="new_password" class="form-control required">
                    </div>
                    <div class="form-group has-feedback">
                        <label for="password_again" class="control-label"><?= $this->lang->line('Password again')?><sup class="mandatory">*</sup></label>
                        <input type="password" name="password_again" id="password_again" class="form-control required" equalTo="#new_password">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="submit_form('#new_password_form','#save_result2')"><?= $this->lang->line('Save')?></button>
            </div>
        </div>
    </div>
</div>
<?php }?>
<div class="middle-box loginscreen  animated fadeInDown">
    <div>
        <div>
            <h1 class="logo-name"><?= $this->lang->line('EMS')?></h1>
        </div>
        <h3><?= $this->lang->line('Welcome to EMS')?></h3>
        <form class="m-t" role="form" action="welcome/check_user" id="check_user" method="POST">
            <div id="save_result"></div>
            <div class="form-group has-feedback">
                <label class="control-label" for="username"><?= $this->lang->line('Username')?><sup class="mandatory">*</sup></label>
                <input type="email" class="form-control required email" placeholder="<?= $this->lang->line('Username')?>" name="username" id="username" maxlength="50">
            </div>
            <div class="form-group has-feedback">
                <label class="control-label" for="password"><?= $this->lang->line('Password')?><sup class="mandatory">*</sup></label>
                <input type="password" class="form-control required" placeholder="<?= $this->lang->line('Password')?>" name="password" id="password">
            </div>
            <button type="button" onclick="submit_form('#check_user')" class="btn btn-primary block full-width m-b"><?= $this->lang->line('Login')?></button>
            <div class="text-center">
                <a href="welcome/forgot_password" data-target="#modal_window" data-toggle="modal"><?= $this->lang->line('Forgot password?')?></a>
            </div>
        </form>
        <p class="m-t text-center"><small><?= $this->lang->line('EMS')?> &copy; <?= date('Y')?></small> </p>
    </div>
</div>
<?php $this->load->view('layout/footer')?>