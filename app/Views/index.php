<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<?= $this->include('layouts/navbar') ?>
    <div class="container mt-5">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-8">
				<div class="text-right">
				<?php if(session()->get('roles') == 1):?>
					<a href="" class="btn btn-warning btn-sm text-white font-weight-bolder" data-toggle="modal" data-target="#createPizza">
						<i class="material-icons float-left" data-toggle="tooltip" title="Add Pizza!" data-placement="left">add</i>&nbsp;Add
					</a>
					<?php endif ?>
				</div>
				<hr>
				<table class="table table-borderless table-hover">
					<tr>
						<th class = "hide">id</th>
						<th>Name</th>
						<th>Ingredients</th>
						<th>Price</th>
					<?php if(session()->get('roles') == 1):?>
						<th>Status</th>
					<?php endif ?>
					</tr>
					<?php foreach($pizzas as $pizza) : ?>
					<tr>
						<td class="hide"><?= $pizza['id']; ?></td>
						<td class="pizzaName"><?= $pizza['name']; ?></td>
						<td><?= $pizza['ingredients']; ?></td>
						<td class="text-success font-weight-bolder"><?= $pizza['price'].' $'; ?></td>
						<?php if(session()->get('roles') == 1):?>
						<td>
							<a href="/edit/<?= $pizza['id'] ?>" data-toggle="modal" data-target="#updatePizza"><i class="material-icons text-info editPizza" data-toggle="tooltip" title="Edit Pizza!" data-placement="left">edit</i></a>
							<a href="/delectPizza/<?= $pizza['id']?>"  data-toggle="tooltip" title="Delete Pizza!" data-placement="right"><i class="material-icons text-danger">delete</i></a>
						</td>
						
						<?php endif ?>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<div class="col-2"></div>
		</div>
	</div>


<!-- ========================================START Model CREATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="createPizza">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Create Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="pizza/addPizza" method="post">
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Pizza name" value="">
				</div>
				<div class="form-group">
					<input type="text" name="price" class="form-control" placeholder="Prize in dollars" value="">
				</div>
				<div class="form-group">
					<textarea name="ingredients" placeholder="Ingredients" class="form-control" value=""></textarea>
				</div>
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
		 	 &nbsp;
		  	<input type="submit" value="CREATE" class="createBtn text-warning">
		  </form>
		  
        </div>
		<?php if(isset($validation)):?>
			<div class="alert alert-danger" role="alert">
				<?= $validation->listErrors() ?>
			</div>
		<?php endif;?>

      </div>
    </div>
  </div>
  <!-- =================================END MODEL CREATE==================================================== -->

  <!-- ========================================START Model UPDATE================================================ -->
	<!-- The Modal -->
	<div class="modal fade" id="updatePizza">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit Pizza</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body text-right">
			<form  action="pizza/update" method="post">
				<div class="form-group">
					<input type="text" class="form-control" name="name" id = "name">
				</div>
				<div class="form-group">
					<textarea class="form-control" name = "ingredients" id ="ingredients"></textarea>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name = "price" id = "price" >
				</div>
				
			<a data-dismiss="modal" class="closeModal">DISCARD</a>
			  &nbsp;
			<input type="hidden" name = "id" id = "id">
		  <input type="submit" value="UPDATE" class="createBtn text-warning">
		
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-- =================================END MODEL UPDATE==================================================== -->

  <script>
	$(document).ready(function(){
		$('.editPizza').on('click',function(){
			$('#updatePizza');
			$tr = $(this).closest('tr');
			var data = $tr.children('td').map(function(){
				return $(this).text();

			}).get();

			$('#id').val(data[0]);
			$('#name').val(data[1]);
			$('#ingredients').val(data[2]);
			$('#price').val(data[3]);
		});
	});
</script>

  <?= $this->endSection() ?>