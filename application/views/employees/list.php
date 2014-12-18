<?php foreach($employees['data'] as $employee){?>
<div class="col-lg-4 person_area">
    <div class="contact-box">
        <a href="employees/edit_employee/<?= $employee['employee_id']?>">
            <div class="col-sm-4">
                <div class="text-center">
                    <img class="img-circle" src="<?= $employee['avatar']?>">
                    <span class="badge badge-success m-t-xs"><?= $this->lang->line($employee['status'])?></span>
                </div>
            </div>
            <div class="col-sm-8">
                <h3><strong><?= $employee['name']?></strong></h3>
                <span>[<?= $employee['department_name']?>] <?= $employee['position_name']?></span>
            </div>
            <div class="clearfix"></div>
        </a>
    </div>
</div>
<?php }?>