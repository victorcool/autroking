<div class="modal fade editCategory-modal" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">     
            <form action="{{route('admin.bank.update')}}" id="" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control required_elem" name="name" id="ModalCategory-name">
                        </div>                
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" id="ModalCategory-id">
                        </div>                
                        <div class="form-group">
                            <button type="submit" id="#" class="btn btn-primary btn-block btn-flat">
                                <span class="__f_loader svg__white"></span>
                                <span class="__f_text"><i class="fas fa-smile fa-sm"></i> Update Now</span>
                            </button>
                        </div>                
                </form>                           
            </div>
               
            <div class="modal-footer">
                <button type="button" class="btn btn-round pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->