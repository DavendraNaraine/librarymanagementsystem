<main>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-heading">
                <h2 class="text-center">Book Information</h2>
                <h5 class="text-center">Add New Book with UG-ID:</h5>
            </div>
            <hr/>
            <div class="modal-body">
                <form class="form-horizontal add" action="" role="form">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">Book Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" readonly="readonly" id="" placeholder="Title will be generated from db">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">Book UG-ID</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="" placeholder="">
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

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-lg">Insert Book</button>

                    </div>

                </form>
            </div>
        </div>
    </div>

    <div class="form-group text-center">
        <a href="<?=$this->config->base_url()?>index.php/view-titles"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      View All Books by Title <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
    </button></a>
    </div>

    <div class="form-group text-center">
        <a href="<?=$this->config->base_url()?>index.php/subject"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      Add a New Book Subject <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </button></a>
    </div>

    <div class="form-group text-center">
        <a href="book-number.php"><button type="button" class="btn btn-success btn-lg" aria-label="Left Align">
      Add Book by UG-ID Number <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
    </button></a>
    </div>

    <!--Search User goes here-->
    <?php $this->load->view('main/search-book');?>
</main>