<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand" href="#"><img src="<?=$this->config->base_url()?>res/images/ug-logo.png" alt="ug-logo" style="max-width:60%; margin-top: -7px; margin-bottom: -7px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?=$this->config->base_url()?>index.php/book">Books</a>
                    </li>
                    <li><a href="<?=$this->config->base_url()?>index.php/user">Users</a>
                    </li>
                      <li><a href="<?=$this->config->base_url()?>index.php/borrow">Borrow Books</a>
                    </li>
                    <li><a href="<?=$this->config->base_url()?>index.php/searchreturn">Return Books</a>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">

                    <li>Welcome User,...<span><a href="#">Logout</a></span></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>