
<div class="wraper container-fluid">
	<div class="page-title">
		<h3 class="title">Subjects</h3>
	</div>


	<div class="panel">

		<div class="panel-body">
			<div class="row">
				<div class="col-sm-6"></div>
			</div>

			<table class="table table-bordered table-striped"
				id="datatable-editable">
				<thead>
					<tr>
						<th>S.No</th>
						<th>Category</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<tr class="gradeX">
						<td>1</td>
						<td>Win 95+</td>
						<td>Active</td>

						<td class="actions">


							<button class="btn btn-primary" data-toggle="modal"
								data-target="#con-close-modal">
								<i class="fa fa-pencil"></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- end: page -->

	</div>
	<!-- end Panel -->


</div>

<!-- MODAL -->

<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true"
	style="display: none;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-hidden="true">×</button>
				<h4 class="modal-title">Create New Subject</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<form role="form" class="p-20">
						<div class="form-group">
							<label for="exampleInputEmail1">Full Name</label> <input
								type="email" class="form-control" id="fullname"
								placeholder="Enter Full Name">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Email Address</label> <input
								type="email" class="form-control" id="exampleInputEmail1"
								placeholder="Enter email">
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Phone Number</label> <input
								type="email" class="form-control" id="phonenumber"
								placeholder="Enter Phone Number">
						</div>
						<button type="submit" class="btn btn-purple">Create</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</div>



