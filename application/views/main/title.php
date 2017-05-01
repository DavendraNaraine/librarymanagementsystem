<div class="alert alert-success" role="alert" style="display:none;">
  <a href="#" class="alert-link">Well done! You successfully added a title.</a>
</div>
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-heading">
			<h2 class="text-center">Book Information</h2>
			<h5 class="text-center">Add New Book Title:</h5>
		</div>
		<hr/>
		<div class="modal-body">
			<form class="form-horizontal add" action="v1/titles" method="post" role="form">
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Title Name</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" id="title" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Title Author</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="author" id="author" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Title Co-Author</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="coAuthor" id="coAuthor" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Title Edition Number</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="edition" id="edition" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Title Publisher</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="publisher" id="publisher" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Title ISBN</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="isbn" id="isbn" placeholder="">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="">Number of Copies</label>
					<div class="col-sm-10">
						<input type="number" class="form-control" name="copies" id="copies" placeholder="">
					</div>
				</div>
				<div class="form-group text-center">
					<button type="submit" class="btn btn-success btn-lg">Insert Book Title Information</button>

				</div>

			</form>
		</div>
	</div>
</div>

<div class="form-group text-center">
	<a href="<?=$this->config->base_url()?>index.php/viewbook"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      View All Books <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
    </button></a>
</div>

<div class="form-group text-center">
	<a href="<?=$this->config->base_url()?>index.php/subject"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      Add a New Book Subject <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </button></a>
</div>

<div class="form-group text-center">
	<a href="<?=$this->config->base_url()?>index.php/book"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      Add Book Number <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </button></a>
</div>