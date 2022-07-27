<div class="row">
<div class="col-md-8">
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Upload CSV File </h3>
              </div> 
              <!-- /.card-header -->
<div class="card-body">
                
                <!-- Import File Code --->
			  <form action="import_query.php" method="post" name="upload_excel" enctype="multipart/form-data">
 <div class="col-sm-8">
  <div class="form-group">
	<label>Import CSV/Excel File:</label>
	<input type="file" multiple name="filename" id="filename" class="btn btn-outline-success btn-block file">
	</div>
	</div>
	
	<button type="submit" id="submit" class="btn btn-success" name="ssubmit" data-loading-text="Loading...">Upload</button>
	
	
</form>
			  <!-- End Import File Code--->
  </div>
</div>			   
               
    </div>	            
      
<div class="row">
<div class="col-md-10">
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Download CSV/Excel File Format</h3>
              </div> 
              <!-- /.card-header -->
<div class="card-body">
                
                <!-- Import File Code --->
			  
 <div class="col-sm-10">
  <div class="form-group">
	<label>Download CSV/Excel File Format:</label>
	
	</div>
	</div>
	
	<button type="submit" id="submit" class="btn btn-primary btn-lg btn-block" name="submit" data-loading-text="Loading...">Download</button>
	
	
</form>
			  <!-- End Import File Code--->
  </div>