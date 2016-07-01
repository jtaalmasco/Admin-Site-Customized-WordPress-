	var data;
	var cnt = 1;
	$(document).ready(function(){
		$('#MainTabContainer').turbotabs();
		var DomainGroup, CheckedDomain, CheckedUserWithNoGroups,clickedGroupValue,dataGroupsList, SelectedOperation, OperatorName, 
		firstLoad = true , ChangeData = true , flagAdd = true, flagEdit = true ,flagDelete = true , flagShowData = true , textBoxAnswer,AddGroupFlag = true;

    	function LoadData(){
    		if(firstLoad)
    		{
    			DomainGroup = 1;
    		}
    		else{
    			DomainGroup = $('#GetDomainGroupF').find(":selected").val();
    		}
			$.ajax({
				url: 'CustomFiles/php/getDomains.php',
				type: 'POST',
				data: {Group: DomainGroup},
				success: function(result){
					$("#domainLists").remove();
					data = result;
					if(data.indexOf(',')== -1)
					{
						addCheckbox(data,false);
					}
					else {
						var temp = new Array();
						temp = data.split(",");

						for(var a in temp){
							addCheckbox(temp[a],true);
							}
						}

						function addCheckbox(name,flag) {
							if(name != ""){
								var checkCountClass = document.getElementsByClassName('domainListClass');
								if(!flag){							
									if (checkCountClass.length <= 1) {
    						 	$(".ShowGroups-Option").append("<div id='domainLists' class='domainListClass'></div>");
								}							
							}

								else{
									if(cnt == 1)
									{
										cnt++;
									}
									else{
										cnt = 1;	
									} 
								}
																					
								if (checkCountClass.length <= 1) {
    						 		$(".ShowGroups-Option").append("<div id='domainLists' class='domainListClass'></div>");
								}
   								var container = $('#domainLists');
   								var inputs = container.find('input');
   								var id = inputs.length+1;

   								$('<input />', { class:'domain-checkBox',type: 'checkbox', id: 'cb'+id, value: name }).appendTo(container);
   								$('<label />', { 'for': 'cb'+id, text: name }).appendTo(container);
   								$(".domain-checkBox").click (function() {
   									CheckedDomain = null;
									if($(this).siblings(':checked').length >= 1) {
       									this.checked = false;
   								}
   							 	$('input:checkbox[class=domain-checkBox]:checked').each(function() 
    							{
       								CheckedDomain =  $(this).val();
    							});
							});
						}
					}
				}
			})
    	
    	}

    	function getOperatorName(){
    		$.ajax({
    			url: 'CustomFiles/php/getOperatorName.php',
    			type: 'POST',
    			success: function(d){
    				OperatorName = d;
    			}
    		})
    	}

    	function showUsersWithNoGroup(){
    		$.ajax({
    			url: 'CustomFiles/php/ShowUsersWithNoDomain.php',
				type: 'POST',
				success: function(result){
					var resultNoDomains  = result;
					resultNoDomains = resultNoDomains.substring(0,resultNoDomains.length - 1);
					var dataresult = new Array();
					dataresult = resultNoDomains.split(",");
					for(var c in dataresult){
						addUserNamesCheckBox(dataresult[c])
					}

					function addUserNamesCheckBox(name){
						//$("#Show-Users-NoGroup").remove();
						if(name != ""){
							var checkClassesCount = document.getElementsByClassName('CheckBox-Users-WithNoGroup-Class');
							if(checkClassesCount.length < 1){ 
								$("#Show-Users-NoGroup").append("<div id='CheckBox-Users-WithNoGroup' class='CheckBox-Users-WithNoGroup-Class'></div>");
							}
							var container2 = $('#CheckBox-Users-WithNoGroup');
   							var inputs = container2.find('input');
   							var id = inputs.length+1;

   							$('<input />', { class:'userName-checkBox',type: 'checkbox', id: 'cb'+id, value: name }).appendTo(container2);
   							$('<label />', { 'for': 'cb'+id, text: name }).appendTo(container2);
   						}
					}
				}
    		})
    	}

    	function CreateUIListsGroup(val){
    		var container3 =  $('#ListsDomain');
    		$('<li/>', {text:val , value: val, class:'UIListsClass'}).appendTo(container3);
    	}

    	function CreateUIDropDownAddEditDelete(val){
    		var container4 =  $('#GetDomainGroupF');
    		container4.append("<option value=" + val + ">" + val + "</option>")
    	}

    	function CreateUIDropAssign(val){
    		var container4 =  $('#ShowDomainGroup');
    		container4.append("<option value=" + val + ">" + val + "</option>")
    	}

    	function LoadGroupLists(){
    		$.ajax({
    			url: 'CustomFiles/php/ShowGroupsList.php',
				type: 'POST',
				success: function(a){
					$(".UIListsClass").remove();
					$("#GetDomainGroupF option").remove();
					$("#ShowDomainGroup option").remove();
					var resultGroups  = a;
					resultGroups = resultGroups.substring(0,resultGroups.length - 1);
					dataGroupsList = new Array();
					dataGroupsList = resultGroups.split(",");
					for(var c in dataGroupsList){
						CreateUIListsGroup(dataGroupsList[c]);
						CreateUIDropDownAddEditDelete(dataGroupsList[c]);
						CreateUIDropAssign(dataGroupsList[c]);
					}
					$("#ListsDomain li:first" ).addClass( "active-Group" );
				}
    		})
    	}

    	$("#ActionSubmitGroupChanges").click (function(){
    		var checked = $('input:checkbox[class=userName-checkBox]:checked').map(function() 
    		{
       			return $(this).val();
    		}).get();
    		if(checked.length != 0){
    			var DomainGroupSelected2 = $('#ShowDomainGroup').find(":selected").val();
    			$.ajax({
                	url: 'CustomFiles/php/UpdateUsersWithNoGroup.php',
					type: 'POST',
					data: { CheckedUsers: checked,
							Group: DomainGroupSelected2
						},
					success: function(d){
						$("#CheckBox-Users-WithNoGroup").remove();
						showUsersWithNoGroup();
						if(DomainGroupSelected2 == clickedGroupValue){
						$("#Show-Users-PerGroup-Container").remove();
						showUsersPerGroup(DomainGroupSelected2);
						}															
					}
                })
    		}
    		else{
    			$('body').dialogbox({type:"normal",title:"Message",message:"Please Select a User"});
    		}
    	});

    	$("#ActionAddGroup").click (function(evt){
    		AddGroupFlag = true;
    		var foundFlag = false;
    		$('body').dialogbox({type:"text/add",title:"Add Group",message:"Please Add New Group"},function($btn,$ans){
    				var CheckDomainGroupsList = dataGroupsList;
    				var value3 = $("#inputTextValue2").val();
    				parseInt(value3);
    				var isInteger = Number(value3);
    				isInteger = Number.isInteger(isInteger);

    				if(!isInteger)
    				{
    					$('body').dialogbox({type:"normal",title:"Message",message:"Please enter only a number"});
    				}
  				
    				for (var i = 0 ; i < CheckDomainGroupsList.length; i++)
    				{
    					if(value3 == CheckDomainGroupsList[i])
    					{
    						foundFlag = true;
    						$('body').dialogbox({type:"normal",title:"Message",message:"Group Already Defined"});
    						break;
    					}
    				}
    				
                	if($btn == "ok" && AddGroupFlag && !foundFlag && isInteger) {
                		alert("a");
                		AddGroupFlag = false;
                		$.ajax({
                			url: 'CustomFiles/php/AddGroup.php',
                			type: 'POST',
                			data: {Group:value3},
                			success: function(){
                				LoadGroupLists();
                			}
                		})
                	}
            	});
    	});

		$("#GetDomainGroupF").change(function(){
			LoadData();
		});

		function showUsersUIPerGroup(val){
			if(val != "" ){
				var checkCountClass2 = document.getElementsByClassName('Show-Users-PerGroup-Container-Class');
				if(checkCountClass2.length < 1){
					$("#Show-Users-PerGroup-Div").append("<div id='Show-Users-PerGroup-Container' class='Show-Users-PerGroup-Container-Class'></div>");
				}
				var container3 = $('#Show-Users-PerGroup-Container');
   				var inputs3 = container3.find('input');
   				var id3 = inputs3.length+1;

   				$('<input />', { class:'userName-Per-Group-checkBox',type: 'checkbox', id: 'cb'+id3, value: val }).appendTo(container3);
   				$('<label />', { 'for': 'cb'+id3, text: val }).appendTo(container3);
   			}
		}

		function showUsersPerGroup(val){		
			$.ajax({
                	url: 'CustomFiles/php/ShowUsersPerGroup.php',
					type: 'POST',
					data: { UserGroup: val
						},
					success: function(d){
						$("#Show-Users-PerGroup-Container").remove();
						var resultUsersPerGroup  = d;
						resultUsersPerGroup = resultUsersPerGroup.substring(0,resultUsersPerGroup.length - 1);
						var dataresultUsersPerGroup = new Array();
						dataresultUsersPerGroup = resultUsersPerGroup.split(",");
						for(var c in dataresultUsersPerGroup){
							showUsersUIPerGroup(dataresultUsersPerGroup[c])
						}													
				}
            })
		}

		$("#ListsDomain").on ("click", "li", function(){
			var tempVal = this.value;
			$('#ListsDomain li.active-Group').removeClass('active-Group');
			$(this).addClass("active-Group");

			if(firstLoad || tempVal == null || tempVal == undefined){
				clickedGroupValue = 1;
			}
			else{
				clickedGroupValue = tempVal;
			}
			showUsersPerGroup(clickedGroupValue);
		});

		$("#Remove-Selected-User-Main").click(function(){
			var checkedToRemoveUsers = $('input:checkbox[class=userName-Per-Group-checkBox]:checked').map(function() 
    		{
       			return $(this).val();
    		}).get();

    		if(checkedToRemoveUsers.length != 0){
    			alert(checkedToRemoveUsers);
    			$.ajax({
                	url: 'CustomFiles/php/RemoveUsersInGroup.php',
					type: 'POST',
					data: { CheckedUsersToRemove: checkedToRemoveUsers
						},
					success: function(d){
						$("#Show-Users-PerGroup-Container").remove();
						showUsersPerGroup(clickedGroupValue);
						$("#CheckBox-Users-WithNoGroup").remove();
						showUsersWithNoGroup();															
					}
                })
    		}
    		else{
    			$('body').dialogbox({type:"normal",title:"Message",message:"Please Select a User"});
    		}
		})

		function ShowDomainLogs(){
			$(".Logs-Class-Domain").remove();
			$.ajax({
				url: 'CustomFiles/php/ShowDomainLogs.php',
				type: 'POST',
				success:function(data){
					$.each(JSON.parse(data),function(k,v){
						 $('#Operators-Log-Table tbody').append('<tr class="Logs-Class-Domain"><td>' + v.GroupID + '</td><td>' + v.OperatorName + '</td><td>' + v.Time + '</td><td>' + v.OperatingType + '</td><td>'+ v.Domain + '</td></tr>');
					})
				}
			})
		}

		$('#ActionRemoveGroup').click(function(evt){
			$('body').dialogbox({type:"yes/no",title:"Yes No Question",message:"Your question..."},function($btn, $ans){
				if($btn == "ok"){
					$.ajax({
					url: 'CustomFiles/php/RemoveSelectedGroup.php',
					type: 'POST',
					data: {Group:clickedGroupValue},
					success:function(){
							showUsersPerGroup(clickedGroupValue);
							LoadGroupLists();	
						}
					})
				}
			})
			
		})



		if(firstLoad){
			DomainGroup = 1;
			clickedGroupValue = 1;
			showUsersPerGroup(clickedGroupValue);
			showUsersWithNoGroup();
			LoadGroupLists();
			ShowDomainLogs();
			$("#GetDomainGroupF").trigger('change');
			getOperatorName();
			firstLoad = false;
		}
        
        //Add Button    
		$("#ActionAddButton").click (function(evt){
			SelectedOperation = "Add";
			flagAdd = true;		
			if(SelectedOperation == "Add"){
			$('body').dialogbox({type:"text",title:"Add Domain",message:"Please Type New Domain"},function($btn,$ans){
				if($ans != undefined){
						textBoxAnswer = $ans;
					}
                if($btn == "ok" && SelectedOperation == "Add" && flagAdd) {
                	flagAdd = false;
                	flagEdit = true;
                	var EditedDomain = $("#inputTextValue").val();
                	$.ajax({
                		url: 'CustomFiles/php/AddDomain.php',
						type: 'POST',
						data: { Domain: textBoxAnswer,
								Group: DomainGroup,
								Operator: OperatorName 
						},
						success: function(){
								//CheckedDomain = null;
								LoadData();
								ShowDomainLogs()
								//
						}
                	})
                }
            });
            }  
		});

		$("#ActionEditButton").click (function(evt){
			SelectedOperation = "Edit";
			flagEdit = true;
			if(CheckedDomain == null || CheckedDomain == "")
			{
            	$('body').dialogbox({type:"normal",title:"Message",message:"Please Select a Domain"});	
			}
			else{
				$('body').dialogbox({type:"text/edit",title:"Edit Domain",message:"Please Edit Domain" ,initialEditValue:CheckedDomain},function($btn,$ans){
					if($ans != undefined){
						textBoxAnswer = $ans;
					}
                	if($btn == "ok" && SelectedOperation == "Edit" && flagEdit) {
                		var EditedDomain = $("#EditTextBox").val();
                		flagEdit = false;
                		$.ajax({
                			url: 'CustomFiles/php/EditDomain.php',
							type: 'POST',
							data: { OrigDomain: CheckedDomain,
									NewDomain: textBoxAnswer,
									Group: DomainGroup,
									Operator: OperatorName 
							},
							success: function(d){
								//CheckedDomain = null;
								LoadData();
								ShowDomainLogs()																
							}
                		})
                	}
            	});
			}
		});

		//Edit Button

			
		$("#ActionDeleteButton").click (function(evt){
			SelectedOperation = "Delete";
			flagDelete = true;
			if(CheckedDomain == null || CheckedDomain == "")
			{
            	$('body').dialogbox({type:"normal",title:"Message",message:"Please Select a Domain"});	
			}
			else{
            	$('body').dialogbox({type:"yes/no",title:"Yes No Question",message:"Your question..."},function($btn, $ans){
                	if($ans != undefined){
						textBoxAnswer = $ans;
					}
                	if($btn == "ok" && SelectedOperation == "Delete" && flagDelete) {
                		flagDelete = false;
                		flagEdit = true;
                    	$.ajax({
                			url: 'CustomFiles/php/DeleteDomain.php',
							type: 'POST',
							data: { Domain: CheckedDomain,
									Group: DomainGroup,
									Operator: OperatorName 
							},
							success:function(d){
								//CheckedDomain = null;
								LoadData();
								ShowDomainLogs()
								
							}
                		})
                	}
            	});
			}		
		})
	});	