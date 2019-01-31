<template>
	<div class="app-container">
		<el-row :gutter="20" class="row">
		    <el-col :span="24" :key="index">
			<el-card class="box-card">
				<div slot="header" class="clearfix">
		    		<span>Contact Form</span>
		  		</div>
		    <form action="" method="post">
			<div class="form-body">

					<div class="form-actions top right">
					<div class="btn-group">
						<button type="button" class="btn">Related Service</button>
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="">Customer Service</a>
							<a class="dropdown-item" href="">Booking Inquiry</a>
							<a class="dropdown-item" href="">Tech Support</a>
						</div>
					</div>
					<div class="btn-group">
						<button type="button" class="btn">Priority</button>
						<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="">High</a>
							<a class="dropdown-item" href="">Medium</a>
							<a class="dropdown-item" href="">Low</a>
						</div>
					</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<fieldset class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" id="text" value="John Doe">
								</fieldset>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<fieldset class="form-group">
									<label>Email</label>
									<input type="email" class="form-control" id="text" value="Email">
								</fieldset>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="form-group">
									<label>Subject</label>
									<input type="text" class="form-control" id="text" value="Subject">
								</fieldset>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<fieldset class="form-group">
									<label>Message</label>
									<textarea class="form-control" id="" rows="12" placeholder="Message"></textarea>
								</fieldset>
							</div>
						</div>
					</div>
					</div>
						<div class="form-actions">
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Submit<i class="ft-thumbs-up position-right"></i></button>
								<button type="button" class="btn btn-warning mr-1">
									<i class="ft-x"></i>Cancel
								</button>
							</div>
			</div>
		</form>
		  </el-card>
		    </el-col>
		</el-row>
	</div>

</template>
<style rel="stylesheet/scss" lang="scss">

</style>
