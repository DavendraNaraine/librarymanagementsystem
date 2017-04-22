<main>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-heading">
				<h2 class="text-center">Return Information</h2>
				<h5 class="text-center">Return A Book:</h5>
			</div>
			<hr/>
			<div class="modal-body">
				<form class="form-horizontal add" action="" role="form">
					<div class="form-group">
						<label class="control-label col-sm-2" for="">Return Condition</label>
						<div class="col-sm-10">
							<select name="" class="form-control">
              <option value="1">Poor</option>
              <option value="2">Fair</option>
              <option value="3">Good</option>
				   <option value="4">Very Good</option>
              <option value="5" selected>Excellent</option>
              </select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="">Return Date</label>
						<div class="col-sm-10">
							<input id="tDate" class="form-control" readonly="readonly">
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg">Return Book</button>
					</div>

				</form>
			</div>
		</div>
	</div>
</main>

<script type="text/javascript" src="<?=$this->config->base_url()?>res/js/autoEnterCurrentDate.js"></script>