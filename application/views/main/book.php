<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-heading">
				<h2 class="text-center">Book Information</h2>
        <h5 class="text-center">Add New Book:</h5>
			</div>
			<hr/>
			<div class="modal-body">
				<form class="form-horizontal add" action="" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book Subject</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="subject" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="title" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book Author</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="author" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book Co-Author</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="coAuthor" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book Publisher</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="publisher" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Edition Number</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="edition" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Number of Pages</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="pages" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Book ISBN</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="isbn" placeholder="">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Number of Copies</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="copies" placeholder="">
            </div>
          </div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg">Insert Book Information</button>

					</div>

				</form>
			</div>
		</div>
	</div>

  <div class="form-group text-center">
    <button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      View All Books <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
    </button>
  </div>

 <!--Search Book goes here-->
   <?$this->load->view('main/search-book');?>