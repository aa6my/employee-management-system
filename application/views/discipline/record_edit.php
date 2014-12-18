<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Discipline'),'forms'=>TRUE,'tables'=>TRUE,'date_time'=>TRUE)) ?>
<script>
    $('document').ready(function(){
        $('.datetimepicker').datetimepicker({pickTime: false});
    })
    
    function delete_record(record_id)
    {
        if (confirm('<?= $this->lang->line('Delete record?')?>'))
        {
            $('#save_result').html('<img src="images/ajax-loader.gif" />');
            $.ajax({
                url:'discipline/delete_record/'+record_id,
                success:function(html){
                    $('#save_result').html(html);
                }
            })
        }
    }
</script>
<div id="wrapper">  
    <?php $this->load->view('layout/menu',array('active_menu'=>'discipline'))?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('layout/page_header')?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $record['name']?>, [<?= ($record['department_name']?$record['department_name']:'-')?>] <?= ($record['position_name']?$record['position_name']:'-')?></h2>
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
                    <div class="btn-group">
                        <button class="btn btn-primary" onclick="submit_form('#save_record')">
                            <i class="fa fa-plus-circle"></i>
                            <?= $this->lang->line('Save')?>
                        </button>
                        <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">  
                            <li>
                                <a href="#" onclick="delete_record(<?= $record['record_id']?>);return false;">
                                    <?= $this->lang->line('Delete')?>
                                </a>
                            </li>
                        </ul>
                    </div>
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
                                    <input type="hidden" name="record_id" id="record_id" value="<?= $record['record_id']?>">
                                    <input type="hidden" name="employee_id[]" id="employee_id" value="<?= $record['employee_id']?>">
                                    <div class="form-group has-feedback">
                                        <label for="headline" class="control-label"><?= $this->lang->line('Headline')?><sup class="mandatory">*</sup></label>
                                        <input type="text" name="headline" id="headline" class="form-control required" value="<?= $record['headline']?>">
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-lg-6" style="padding-left: 0;">
                                        <div class="form-group has-feedback">
                                            <label for="date" class="control-label"><?= $this->lang->line('Date')?><sup class="mandatory">*</sup></label>
                                            <input type="text" name="date" id="date" class="form-control required datetimepicker" value="<?= date('Y-m-d',strtotime($record['date']))?>" data-date-format="<?= $this->config->item('js_month_format')?>">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="form-group has-feedback">
                                        <label for="description" class="control-label"><?= $this->lang->line('Description')?><sup class="mandatory">*</sup></label>
                                        <textarea rows="5" class="form-control required" name="description" id="description"><?= $record['description']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment" class="control-label"><?= $this->lang->line('Comment')?></label>
                                        <p><i><?= $record['comment']?></i></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="taken_actions" class="control-label"><?= $this->lang->line('Taken actions')?></label>
                                        <textarea rows="5" class="form-control" name="taken_actions" id="taken_actions"><?= $record['taken_actions']?></textarea>
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