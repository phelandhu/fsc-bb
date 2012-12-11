	var LeadProvider                 = "";
	var phone                        = "";
	var TechnicalPOCName             = "";
	var TechnicalPOCEmailAddress     = "";
	var SalesPOCName                 = "";
	var SalesPOCemail                = "";
	var IntegrationDate              = "";
	var SendingURL                   = "";


	function loadLeadProviders(lp,ph,tn,te,sn,se,id,su) 
	{
		document.getElementById("LeadProvider").value                = lp;
		document.getElementById("phone").value                       = ph;
		document.getElementById("TechnicalPOCName").value            = tn;
		document.getElementById("TechnicalPOCEmailAddress").value    = te;
		document.getElementById("SalesPOCName").value                = sn;
		document.getElementById("SalesPOCemail").value               = se;
		document.getElementById("IntegrationDate").value             = id;
		document.getElementById("SendingURL").value                  = su;
		
		var LeadProvider = document.getElementById("LeadProvider");
		LeadProvider .value = lp;
	} 


	function makeRequest(url, parameters) 
	{
		http_request = false;
		if (window.XMLHttpRequest) { // Mozilla, Safari,...
			http_request = new XMLHttpRequest();
			if (http_request.overrideMimeType) {
				http_request.overrideMimeType('text/html');
			}
			} else if (window.ActiveXObject) { // IE
				try {
				http_request = new ActiveXObject("Msxml2.XMLHTTP");
				} catch (e) {
					try {
						http_request = new ActiveXObject("Microsoft.XMLHTTP");
					} catch (e) {}
				}
			}
			if (!http_request) {
				alert('Cannot create XMLHTTP instance');
				return false;
			}
			
			if(url == "formprocessor.php") {
				http_request.onreadystatechange = formresults;
				http_request.open('GET', url + parameters, true);
				http_request.send(null);
		}else{
		}
	}
	function formresults()
	{
		if (http_request.readyState == 4) {
			if (http_request.status == 200) {
				//alert(http_request.responseText);
				result = http_request.responseText;
				document.getElementById("response2").innerHTML = result;
			} else {
				alert('There was a problem with the request.');
			}
		}
	}

	function resetForm($form) {
		$form.find('input:text, input:password, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox')
			 .removeAttr('checked').removeAttr('selected');
	}

	function selectrule()
	{
		resetForm($('#editrule')); // by id, recommended
		$(".selsts").attr('checked', false);
		var selectedvalue = document.getElementById("RulesManagementSetListing");
		document.getElementById("RuleSetTitle").value = selectedvalue.options[selectedvalue.selectedIndex].text;
		var rulesId = selectedvalue.options[selectedvalue.selectedIndex].value;
		document.getElementById("rulesManagementSetId").value = rulesId;

		if(rulesId > 0) {
			$.ajax({ url: '/ajax.php',
				data: {method: 'getRulesList', 
				userId: '1',
				rulesId : rulesId},
				type: 'post',
				success: function(output) {
					var strArray = output.split(",");
					for (var i = 0; i < strArray.length; i++) {
						$('input[name=rulesID[' + strArray[i] + ']]').attr('checked', true);
					}
				}
			});
		}

	}


	function sendform(Obj)
	{
		var oform =  document.forms["form"];
		oform.elements.length;
		var str = '?intention='+Obj+'&';
		var elem = oform.elements;
		for(var i = 0; i <  elem.length; i++) {
			if(elem[i].id !='' ) {
				//str += "||  Type:" + elem[i].type + "";
				if(elem[i].type == "checkbox" || elem[i].type == "radio" && elem[i].checked == true) {
					str += "" + elem[i].name + "";
					if(elem[i].checked) {
						if(i !=  elem.length - 1) {
							str += "=" + "1" + "&";
						} else {
							str += "=" + "1" ;
						}
					} else {
						if(i !=  elem.length - 1) {
							str += "=" + "0" + "&";
						} else {
							str += "=" + "0" ;
						}
					}
				} else {
					str += "" + elem[i].id + "";
					if(i !=  elem.length - 1) {
						str += "=" + elem[i].value + "&";
					} else {
						str += "=" + elem[i].value ;
					}
				}
			}
		} 
		alert(str);
		makeRequest( "formprocessor.php" , str );
	}

	function gatherFormElements()
	{
	
	}

	function Get_TechnicalPOCName()
	{
		var TechnicalPOCName = document.getElementById("TechnicalPOCName").value;
		if(TechnicalPOCName != "")
		{
			document.getElementById("SalesPOCName").value = TechnicalPOCName;
		}else{
			alert("Technical Point of contact field is empty");
		}
	}
	function Get_TechnicalPOCEmailAddress()
	{
		var TechnicalPOCEmailAddress = document.getElementById("TechnicalPOCEmailAddress").value;
		if(TechnicalPOCEmailAddress  != "")
		{
			document.getElementById("SalesPOCemail").value = TechnicalPOCEmailAddress;
		} else {
			alert("Technical POC Email Address is Empty");
		}
	}