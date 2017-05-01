<div class="alert alert-success" role="alert" style="display:none;">
  <a href="#" class="alert-link">Well done! You successfully added a subject.</a>
</div>
<main>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-heading">
        <h2 class="text-center">Book Information</h2>
        <h5 class="text-center">Add New Book Subject:</h5>
      </div>
      <hr/>
      <div class="modal-body">
        <form class="form-horizontal add" action="v1/subjects" method="post" role="form">
          <div class="form-group">
            <label class="control-label col-sm-2" for="">Subject Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="subject_name" id="subject_name" placeholder="">
            </div>
          </div>

          <div class="form-group text-center">
            <button type="submit" class="btn btn-success btn-lg">Insert Book Subject</button>

          </div>

        </form>
      </div>
    </div>
    </div>
</main>