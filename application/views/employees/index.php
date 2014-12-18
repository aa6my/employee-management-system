<?php $this->load->view('layout/header',array('title'=>$this->lang->line('Employees'),'forms'=>TRUE,'scroll'=>TRUE)) ?>
<script>
    $('document').ready(function(){
        $('#employees_list').infinitescroll({
            navSelector      : "#next:last",
            nextSelector     : "a#next:last",
            itemSelector     : "div.person_area",
            dataType         : 'html',
            loading:{
                msgText          : '<?= $this->lang->line('Processing')?>',
                finishedMsg      : '',    
            },
            maxPage          : <?= $employees['amount']?>,
            path: function(index) {return 'employees/index/'+index+'?search=<?= ($search?$search:'')?>';}
        });
    })
</script>
<div id="wrapper">
    <?php $this->load->view('layout/menu',array('active_menu'=>'employees'))?>
    <div id="page-wrapper" class="gray-bg">
        <?php $this->load->view('layout/page_header')?>
        
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-8">
                <h2><?= $this->lang->line('List')?></h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="dashboard"><?= $this->lang->line('Home')?></a>
                    </li>
                    <li>
                        <?= $this->lang->line('Employees')?>
                    </li>
                </ol>
            </div>
            <div class="col-lg-4">
                <div class="title-action">
                    <a href="employees/new_employe" class="btn btn-primary">
                        <i class="fa fa-plus-circle"></i>
                        <?= $this->lang->line('New')?>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInDown">
                    <div class="row">
                        <div class="col-lg-12 m-b-md">
                            <div class="search-form">
                                <form action="employees" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control input-lg" value="<?= ($search)?$search:''?>">
                                        <div class="input-group-btn">
                                            <button class="btn btn-lg btn-primary" type="submit"><?= $this->lang->line('Search')?></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <a id="next" class="hide" href="#">#</a>
                        <div id="employees_list">
                            <?php $this->load->view('employees/list')?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('layout/footer')?>