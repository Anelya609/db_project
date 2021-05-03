<html>
 <head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Project</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 </head>
 <body>
  <div class="container">    
     <br />
     <h3 align="center">Project Application</h3>
     <br />
     <div align="right">
      <button type="button" name="create_record" id="create_record" class="btn btn-success btn-sm">Add row</button>
     </div>
     <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped" id="user_table">
           <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="5%">Name</th>
                <th width="5%">Age</th>
                <th width="20%">Photo</th>
                <th width="5%">Nationality</th>
                <th width="5%">Potential</th>
                <th width="10%">Club</th>
                <th width="20%">Club_Logo</th>
                <th width="5%">Wage</th>
                <th width="20%">Action</th>
            </tr>
           </thead>
           <tbody>
           <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr>
           <td><?php echo e($row->id); ?></td>
           <td><?php echo e($row->name); ?></td>
           <td><?php echo e($row->age); ?></td>
           <td><?php echo e($row->photo); ?></td>
           <td><?php echo e($row->nationality); ?></td>
           <td><?php echo e($row->potential); ?></td>
           <td><?php echo e($row->club); ?></td>
           <td><?php echo e($row->club_logo); ?></td>
           <td><?php echo e($row->wage); ?></td>
           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
       </table>
   </div>
   <br />
   <br />
  </div>
 </body>
</html>

<script>
$(document).ready(function(){

$('#user_table').DataTable({
 processing: true,
 serverSide: true,
 ajax:{
  url: "<?php echo e(route('ajax-crud.index')); ?>",
 },
 columns:[
    {
   data: 'ID',
   name: 'ID'
  },
  {
   data: 'Name',
   name: 'Name'
  },
  {
   data: 'Age',
   name: 'Age'
  },
  {
   data: 'Photo',
   name: 'Photo',
   render: function(data, type, full, meta){
    return "<img src=<?php echo e(URL::to('/')); ?>/images/" + data + " width='70' class='img-thumbnail' />";
   },
   orderable: false
  },
  {
   data: 'Nationality',
   name: 'Nationality'
  },
  {
   data: 'Potential',
   name: 'Potential'
  },
  {
   data: 'Club',
   name: 'Club'
  },
  {
   data: 'Club_Logo',
   name: 'Club_Logo',
   render: function(data, type, full, meta){
    return "<img src=<?php echo e(URL::to('/')); ?>/images/" + data + " width='70' class='img-thumbnail' />";
   },
   orderable: false
  },
  {
   data: 'Wage',
   name: 'Wage'
  },
  {
   data: 'action',
   name: 'action',
   orderable: false
  }
 ]
});

</script><?php /**PATH C:\xampp\htdocs\dbms_project\resources\views/ajax_index.blade.php ENDPATH**/ ?>