<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<?php include 'CustomFiles/php/declarations.php';/* Template Name: Operator */ 
	?> 
	</head>
	<body>
		<div class="selectGroup">
			<SELECT NAME="char"> 
				<?php
					$GroupsList = $wpdb -> get_results("SELECT DomainID from testing_domain_group");
					while($row=mysql_fetch_array($GroupsList)){
						$id=$row["DomainID"];
						echo "<OPTION VALUE=$id>$id</option>" ;    
					}
				?>
			</SELECT> 
				<?php
					$GroupsList = $wpdb -> get_results("SELECT DomainID from testing_domain_group");
					foreach ($GroupsList as $key => $value) {
						echo $key "\n";
					}
					print_r($GroupsList);
				
				?>
		</div>
	</body>
</html>