<div class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only"><?= $this->lang->line('Close')?></span></button>
                <h4 class="modal-title"><?= $this->lang->line('Record')?></h4>
            </div>
            <div class="modal-body">
                <label class="control-label"><?= $this->lang->line('Headline')?></label>
                <p><i><?= $discipline['headline']?></i></p>
                
                <label class="control-label"><?= $this->lang->line('Description')?></label>
                <p><i><?= $discipline['description']?></i></p>
                
                <label class="control-label"><?= $this->lang->line('Taken actions')?></label>
                <p><i><?= $discipline['taken_actions']?></i></p>
                
                <form action="dashboard/save_comment" method="POST" id="save_comment">
                    <div id="save_result2"></div>
                    <input type="hidden" name="record_id" value="<?= $discipline['record_id']?>">
                    <div class="form-group has-feedback">
                        <label for="comment" class="control-label"><?= $this->lang->line('Comment')?></label>
                        <textarea rows="5" name="comment" id="comment" class="form-control"><?= $discipline['comment']?></textarea>
                    </div>
                </form>    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('Close')?></button>
                <button type="button" class="btn btn-primary" onclick="submit_form('#save_comment','#save_result2')"><?= $this->lang->line('Save comment')?></button>
            </div>
        </div>
    </div>
</div>