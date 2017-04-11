<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-heading">
            <h2 class="text-center">User Information</h2>
            <h5 class="text-center">Add New User:</h5>
        </div>
        <hr/>
        <div class="modal-body">
            <form class="form-horizontal add" action="" role="form">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Enter Username">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="">Re-type Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="" placeholder="Re-type Password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Enter First Name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="" placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg">Insert User Information</button>
                </div>

            </form>
        </div>
    </div>
</div>

<div class="form-group text-center">
    <button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      View All Users <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
    </button>
</div>

<!--Search User goes here-->
<?$this->load->view('main/search-user');?>