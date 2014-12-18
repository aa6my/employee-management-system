<label><?= $this->lang->line('Missed skills')?></label>
<ul class="unstyled no-padding">
<?php foreach($data as $categories){?>
    <li>
        <strong><?= $categories[0]['category_name']?></strong>
        <ul class="unstyled no-padding">
            <?php foreach($categories as $skill){?>
            <li>
            <i class="badge badge-danger">
                <i class="fa fa-exclamation-triangle"></i>
            </i>  <?= $skill['skill_name']?></li>
            <?php }?>
        </ul>
    </li>
<?php }?>
</ul>