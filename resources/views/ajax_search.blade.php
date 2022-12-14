
<!DOCTYPE html>
<html>
 <head>
  <title>Ajax search in laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 </head>
 <body>
  <br />
  <div class="container box">
   <h3 align="center">Ajax search in laravel</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search Customer Data" />
     </div>
     <div class="table-responsive">
      <h3 align="center">Total Data : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Title</th>
         <th>Company</th>
         <th>Location</th>
         <th>Description</th>
        </tr>
       </thead>
       <tbody>
        <meta name="csrf-token" content="{{ csrf_token() }}">
       </tbody>
      </table>
     </div>
    </div>    
   </div>
  </div>
  
 </body>
</html>

<script>
  
$(document).ready(function(){
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
 fetch_customer_data();

 function fetch_customer_data(query = '')
 {

  $.ajax({
   url:"{{ route('ajax_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
});
</script>
