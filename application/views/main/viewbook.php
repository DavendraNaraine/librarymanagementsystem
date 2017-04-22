<div class="container">
    <ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>index.php/book">Books</a></li>
        <li><a href="<?=$this->config->base_url()?>index.php/viewtitle">Titles</a></li>
        <li class="active">Borrow Book</li>
    </ol>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>U.G ID</th>
                <th>Condition</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Database Design for Noobs</td>
                <td>101783445AF</td>
                <td>Excellent</td>
                <td>
                    <a href="#"><button type="button" class="btn btn-success" aria-label="Left Align">
          Edit <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </button></a>

                    <a href="#"><button type="button" class="btn btn-success" aria-label="Left Align">
          Delete <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
        </button></a>

                    <a href="<?=$this->config->base_url()?>index.php/borrow"><button type="button" class="btn btn-success" aria-label="Left Align">
          Borrow <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
        </button></a>
                </td>
            </tr>

        </tbody>
    </table>
</div>