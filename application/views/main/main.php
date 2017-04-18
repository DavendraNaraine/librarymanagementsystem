<body>
     <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-heading">
        <img src="<?=$this->config->base_url()?>res/images/ug-logo.png" alt="ug-logo">
				<h2 class="text-center">Login</h2>
			</div>
			<hr/>
			<div class="modal-body">
				<form action="" role="form">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
							</span>
							<input type="text" class="form-control" placeholder="Username" />
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
							</span>
							<input type="password" class="form-control" placeholder="Password" />

						</div>

					</div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg">Login</button>
					</div>

          <div class="form-group text-center white">
            <span>
              <span><a style="color: white;" href="#">Forgot Password</a></span> &nbsp;&nbsp;&nbsp;
              <span><a style="color: white;" href="#">Register</a></span>
            </span>
          </div>

				</form>
			</div>
		</div>
	</div>