<div class="container">
	<div class="row" style="margin-top: 30px">

		<?php foreach ($proses->result() as $item): ?>
			<div class="col-md-4" style="margin-top: 30px">
				<div class="card" style="width: 20rem;">

				  <a href="<?php echo site_url('tampil/detail/').$item->slug ?>"><img class="card-img-top" src="https://www.wearedevelopers.com/wp-content/uploads/2016/01/smart-database-driven-routing-in-codeigniter.jpg" alt="Card image cap"></a>

				  <div class="card-body">
				    <a href="<?php echo site_url('DetailPrediksiHari/detail/').$item->slug ?>"><h4 class="card-title"><?php echo $item->title ?></h4></a>
				    <p class="card-text"><?php echo $item->description ?></p>
				    <p class="card-text"><?php echo $item->date_time ?></p>
				    <a href="<?php echo site_url('DetailPrediksiHari/detail/').$item->slug ?>" class="btn btn-primary">Go somewhere</a>
				  </div>

				</div>
			</div>
		<?php endforeach; ?>

	</div>
</div>