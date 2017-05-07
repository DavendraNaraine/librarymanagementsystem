<div class="container">

    <ol class="breadcrumb">
        <li><a href="<?=$this->config->base_url()?>index.php/book">Books</a></li>
        <li class="active">Titles</li>
    </ol>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Edition</th>
                <th>ISBN</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- Dynamic content will have to go here-->
                <th scope="row">1</th>
                <td>Database</td>
                <td>Database Design for Noobs</td>
                <td>Sir G</td>
                <td>University of Ghana</td>
                <td>7th</td>
                <td>978-3-16-148410-0</td>
                <td>
                    <a href=""><button type="button" class="btn btn-success" aria-label="Left Align">
          Edit <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </button></a>


                    <a href="<?=$this->config->base_url()?>index.php/viewbook"><button type="button" class="btn btn-success" aria-label="Left Align">
          Borrow from Set <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
        </button></a>
                </td>
            </tr>

        </tbody>
    </table>
</div>

<script type='text/javascript'>
    $(document).ready(function() {
        /* call the php that has the php array which is json_encoded */
        $.getJSON('api_view.php', function(data) {
            /* data will hold the php array as a javascript object */
            $.each(data, function(key, val) {
                $('tr').append('<th id="' + key + '">' +  '</th>');
                $('td').append(val.title_name);
                $('td').append(val.title_author);
                $('td').append(val.title_edition);
                $('td').append(val.title_publisher);
            });
        });

    });
</script>