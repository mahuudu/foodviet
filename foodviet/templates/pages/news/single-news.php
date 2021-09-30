
<?php

include_once('templates/layout/header.php');
?>
<div id="content">
	<div id="content-container " class="container single-news">
		<div class="inner">

			<main id="main">			

				<section class="section">
					<?php
					while ($row= mysqli_fetch_assoc($result)) {
						?>
						<h1 class="page-heading">							
							<?php  echo $row['title'] ?>
						</h1>
						<div class="singular-post-content ">
							<?php echo $row['content'] ?>
						</div>
						<?php
					}
					?>

						
					
				</section>


			</main>

		</div>
	</div>
</div>
<?php
include_once('templates/layout/footer.php');
?>