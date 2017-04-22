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
                <div class="form-group">
                    <label class="control-label col-sm-2" for="">User Type</label>
                    <div class="col-sm-10">
                        <select name="" class="form-control" onchange="showDiv(this)">
              <option value="1" selected>Student</option>
              <option value="2">Librarian</option>
              <option value="3">Admin</option>
              </select>
                    </div>
                </div>
                <div class="form-group" id="student-usi" style="display:none;">
                    <label class="control-label col-sm-2" for="">Student USI</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="" placeholder="Enter Student USI">
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg">Insert User Information</button>
                </div>

            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function showDiv(select) {
        if (select.value == 1) {
            document.getElementById('student-usi').style.display = "block";
        } else if (select.value == 2) {
            document.getElementById('student-usi').style.display = "none";
        } else if (select.value == 3) {
            document.getElementById('student-usi').style.display = "none";
        }
    }
</script>

  <div class="form-group text-center">
        <a href="<?=$this->config->base_url()?>index.php/viewuser"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      View All Users <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
    </button></a>
    </div>

<!--Search User goes here-->
<?php $this->load->view('main/searchuser');?>