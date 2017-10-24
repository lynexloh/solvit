$(document).ready(function(){
    $('.avail-member').click(function(e){
	//console.log(availNodes[this.id]);
	lastNode = availNodes[this.id];
	$('#reg-form').modal();
    });

    var name=faker.name.findName();
    $('form')[0].getElementsByTagName('input')[0].value = name;
    $('form')[0].getElementsByTagName('input')[1].value = name.split(' ')[0];
    $('form')[0].getElementsByTagName('input')[2].value = 'g12345';
    $('form')[0].getElementsByTagName('input')[3].value = '01/01/1920';
    $('form')[0].getElementsByTagName('input')[4].value = faker.internet.email();
    $('form')[0].getElementsByTagName('input')[5].value = '01123242324';
    $('form')[0].getElementsByTagName('input')[6].value = '50490';
    $('form')[0].getElementsByTagName('input')[7].value = 'Bangsar, KL';
    $('form')[0].getElementsByTagName('select')[0].value = "Gold";
    $('form')[0].getElementsByTagName('select')[1].value = "Malaysia";
    
    $('form#register-form').submit(function(e){	
	e.preventDefault();
	var formArray = $('form#register-form').serializeArray();
	
	var formInfo = {};
	formArray.forEach(function(el,i){formInfo[el.name] = el.value;});
	console.log(formInfo);

	$.post("ajax_handler/ajax_handler.php",
	       {
		   action: 'register_user',
		   param:  formInfo,
		   pos:    lastNode.pos
	       },
	       function(response, status){	
		   try{
                       jsonResponse = JSON.parse(response);			  
                   }catch(err){
                       alert("Sorry, we are not able to fulfill the request. Your query cannot be processed right now.");
                       console.log("Report the following error message: Cannot process the output provided by AJAX script. ");
                       return;
                   }
		   
		   alert("Register success!");
		   window.location.reload();
	       });
	      
    }
    );
    
/*    $('form#register-form').submit(
	function(e){
	    e.preventDefault();
	    console.log(e);
	    
            var formArray = $('form#register-form').serializeArray();
	    var formInfo = {};
	    formArray.forEach(function(el,i){formInfo[el.name] = el.value;});
	    
	    //parentNode = nodes.get(getParent(lastNode.id));
	    $.post("ajax_handler/ajax_handler.php",
		   { action: 'register_user1',
		     param: formInfo,
		     //lastNode: lastNode,
		     //parentNode: parentNode.info,
		     //sponsorNode: myNode//,
		     //complete: complete
		   },
		   
		   function(response, status){
		       alert("AOK!");
		  *    console.log(response, status);
		       try{
                           jsonResponse = JSON.parse(response);			  
                       }catch(err){
                           alert("Sorry, we are not able to fulfill the request. Your query cannot be processed right now.");
                           console.log("Report the following error message: Cannot process the output provided by AJAX script. ");
                           return;
                       }
		       if(jsonResponse.result == false){  //NEW CODE
			   random_id = jsonResponse.random_id;
			   ("input#enrolled_id_n")[0].value = random_id;
			   alert("Sorry. "+jsonResponse.msg);
		       }else{
			   $('#reg-form').modal('hide');		
		       }		      

		   }
		  );
	    return false;
	}
    );*/

});

