<div class="container">

<ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>index.php/book">Books</a></li>
        <li><a href="<?=$this->config->base_url()?>index.php/viewtitle">Titles</a></li>
      <li><a href="<?=$this->config->base_url()?>index.php/viewbook">Borrow Book</a></li>
	   <li class="active">Borrow Book Information</li>
    </ol>


<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-heading">
				<h2 class="text-center">Borrow Information</h2>
        <h5 class="text-center">Borrow A Book:</h5>
			</div>
			<hr/>
			<div class="modal-body">
				<form class="form-horizontal add" action="" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Student USI</label>
            <div class="col-sm-10">
              <input type="number" class="form-control"  id="" placeholder="Enter Student USI">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book Condition</label>
            <div class="col-sm-10">
              <select name="" class="form-control">
              <option value="1" selected>Excellent</option>
              <option value="2">Good</option>
              <option value="3">Moderate</option>
              <option value="4">Poor</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Current Date</label>
            <div class="col-sm-10">
              <input id="tDate" class="form-control" readonly="readonly">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Return Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="" placeholder="Enter Return Date ">
            </div>
          </div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg">Borrow Book</button>
					</div>

				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src="<?=$this->config->base_url()?>res/js/autoEnterCurrentDate.js"></script>
	
		
</div> 