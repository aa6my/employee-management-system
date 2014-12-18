<script>
    $('document').ready(function(){
        $('body').on('click','.remove_attachment',function(){
            if (confirm('<?= $this->lang->line('Delete attachment ?')?>'))
            {
                attachment_id = $(this).attr('attachment_id');
                $("#attachment_"+attachment_id).remove();
                $.ajax({
                    url:'employees/remove_attachment/'+attachment_id
                })
            }
        })
    })
</script>