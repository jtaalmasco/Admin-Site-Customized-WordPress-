<!doctype html>
<html>
	<meta charset="utf-8">
	<title></title>
	<?php /* Template Name: Operators2 */ 
	?>
	<script type="text/javascript" src='CustomFiles/js/plugins/jquery-1.12.4.js'></script>
	<script type="text/javascript" src='CustomFiles/js/plugins/Tabs/turbotabs.js'></script>
	<script type="text/javascript" src='CustomFiles/js/plugins/jquery.frontbox-1.1.js'></script>
	<script type="text/javascript" src='CustomFiles/js/OperatorMain.js'></script>
	<link rel="stylesheet" href="CustomFiles/css/Tabs/turbotabs.css">
	<link rel="stylesheet" href="CustomFiles/css/Tabs/animate.min.css">
	<link rel="stylesheet" href="CustomFiles/css/Tabs/font-awesome.min.css">
	<link rel="stylesheet" href="CustomFiles/css/Operators.css">
	<link rel="stylesheet" href="CustomFiles/css/jquery.frontbox-1.1.css">
</head>
<body>
	<div id ="MainTabContainer">
		<ul class="tt_tabs">
			<li class="active"> Add Group</li>
			<li>Add/Edit/Delete Domains</li>
			<li> Assign Domains</li>
			<li>Operators Log</li>
		</ul>

		<div class = "tt_container">
			<div class="Add-Group tt_tab active">
				<div class = "Taken-Groups-Level-Container"> 
					<div class="text-Taken-Groups">
						<span id = "Taken-Groups-Span">Taken Groups:</span>
						<ul id="ListsDomain">
						</ul>
					</div>
				</div>
				<div class= "Add-Group-Buttons-Container">
					<div class ="Add-New-Group">
						<button id = "ActionAddGroup"  type="button" class="button button-black">Add New Group</button>
					</div>
					<div class ="Remove-Group">
						<button id = "ActionRemoveGroup"  type="button" class="button button-black">Remove Group</button>
					</div>
					<div class ="Remove-Selected-Users">
						<button id = "Remove-Selected-User-Main" class="button button-black" type="button">Remove Selected Users</button>
					</div>
				</div>
				<div id ="Show-Users-PerGroup-Div">
					<div id ="Show-Users-PerGroup-Container" class ="Show-Users-PerGroup-Container-Class">
					</div>
				</div>
			</div>
			<div class="AddEditDeleteDomain tt_tab">
				<div class = "SelectGroup-Option">
					<h3> OperatorName : </h3>
					<label id ="OperatorName">
						<?php 
							$current_user = wp_get_current_user();
							echo $current_user->display_name ;			 	
						?>
					</label>
					<h3> Select Group </h3>
					<form method = "post">
					<select id="GetDomainGroupF" name="GetDomainGroup">
						
					</select>
					</form>
				</div>
				<div class = "ShowGroups-Option">
					<div class="Available-Domains-text">
						<h3> Available Domains</h3>
					</div>
					<div class= "Domain-Lists-Container">
						<div id="domainLists" class="domainListClass"></div>
					</div>
					<div class="Buttons-Container-AED">
						<form method = "post">
							<div id = "ButtonsSelection">
								<button id = "ActionAddButton"  class="button button-black" type="button">Add</button>
								<button id = "ActionEditButton"  class="button button-black" type="button">Edit</button>
								<button id = "ActionDeleteButton"  class="button button-black" type="button">Delete</button>
							</div>
						</form>
					</div>
				</div>
				
			</div>
			<div class="Assign-Domains-Container tt_tab">
				<div class ="Show-Groups">
					<span id="Choose-Groups-Span">Choose Group</span>
					<form method="post">
						<select id="ShowDomainGroup" name="ShowDomainGroup">						
						</select>
					</form>
				</div>
				<div id ="Show-Users-NoGroup">
					<div class = "No-Group-Text-Button">
						<span id = "Users-With-No-Group-Span">Users With no Group:</span>
						<div id= "Action-Container-Button">
							<button id = "ActionSubmitGroupChanges" class="button button-black" type="button">Submit</button>
						</div>
					</div>
					<div id = "CheckBox-Users-WithNoGroup" class="CheckBox-Users-WithNoGroup-Class">
					</div>				
				</div>
			</div>
			<div class= "Operators-Domain-Log tt_tab">
				<div class="Table-Container-Operators-Log">
				<span id = "Operators-Log">Operators Log</span>
				<table id = "Operators-Log-Table" style="border-collapse: collapse;">
					<thead style="border: 2px solid black; background-color:black;color:#AB8826;">
					<tr>
						<th>GroupID</th>
						<th>Operator Name</th>
						<th>Time</th>
						<th>Operating Type</th>
						<th>Domain</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
				</div>
			</div>
			</div>
	</div>
</body>

</html>