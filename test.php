<!--
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>PHP Live MySQL Database Search</title>
<style type="text/css">
    body{
        font-family: Arail, sans-serif;
    }
    /* Formatting search box */
    .search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('#search').keyup(function(){
     $('#result').show();
	 var x = $(this).val();
	 $.ajax(
	 {
	 type:'GET',
	 url: 'database.php',
		data: 'q='+x, 
	 success:function(data)
	 {
		 $("#result").html(data);
	  }
	 });	 
    });

});
</script>
</head>
<body> 
    <div class="search-box">
        <input type="text" name ="name" id="search" autocomplete="off" placeholder="Search for a user" />
        <a href="test.php?search=<?php echo $ids; ?>"><div class ="result" id="result"></div></a>
    </div>
</body>
</html>



-->




<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM links";
$result = $db_handle->runQuery($query);
?>
<HTML>
<HEAD>
<TITLE>PHP Voting System with jQuery AJAX</TITLE>
<style>
body{width:610;}
.demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.demo-table th {background: #81CBFD;padding: 5px;text-align: left;color:#FFF;}
.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.demo-table td div.feed_title{text-decoration: none;color:#333;font-weight:bold;}
.demo-table ul{margin:0;padding:0;}
.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
.btn-votes {float:left; padding: 0px 5px;cursor:pointer;}
.btn-votes input[type="button"]{width:32px;height:32px;border:0;cursor:pointer;}
.up {background:url('up.png')}
.up:disabled {background:url('up_off.png')}
.down {background:url('down.png')}
.down:disabled {background:url('down_off.png')}
.label-votes {font-size:1.0em;color:#40CD22;width:32px;height:32px;text-align:center;font-weight:bold;}
.desc {float:right;color:#999;width:90%;}

</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
/* vote.js */
function addVote(id,vote_rank) {
	$.ajax({
	url: "add.php",
	data:'id='+id+'&vote_rank='+vote_rank,
	type: "POST",
	beforeSend: function(){
		$('#links-'+id+' .btn-votes').html("<img src='LoaderIcon.gif' />");
	},
	success: function(vote_rank_status){
	var votes = parseInt($('#votes-'+id).val());
	var vote_rank_status;// = parseInt($('#vote_rank_status-'+id).val());
	switch(vote_rank) {
		case "1":
		votes = votes+1;
		//vote_rank_status = vote_rank_status+1;
		break;
		case "-1":
		votes = votes-1;
		//vote_rank_status = vote_rank_status-1;
		break;
	}
	$('#votes-'+id).val(votes);
	$('#vote_rank_status-'+id).val(vote_rank_status);
	
	var up,down;
	
	if(vote_rank_status == 1) {
		up="disabled";
		down="disabled";
	}
	if(vote_rank_status == -1) {
		up="disabled";
		down="disabled";
	}	
	var vote_button_html = '<input type="button" title="Up" class="up" onClick="addVote('+id+',\'1\')" '+up+' /><div class="label-votes">'+votes+'</div><input type="button" title="Down" class="down"  onClick="addVote('+id+',\'-1\')" '+down+' />';	
	$('#links-'+id+' .btn-votes').html(vote_button_html);
	}
	});
}
</script>

</HEAD>
<BODY>
<table class="demo-table">
<tbody>
<tr>
<th><strong>Links</strong></th>
</tr>
<?php
if(!empty($result)) {
$ip_address = $_SERVER['REMOTE_ADDR'];
foreach ($result as $links) {
?>
<tr>
<td valign="top">
<div id="links-<?php echo $links["id"]; ?>">
<input type="hidden" id="votes-<?php echo $links["id"]; ?>" value="<?php echo $links["votes"]; ?>">
<?php

$vote_rank = 0;
$query ="SELECT SUM(vote_rank) as vote_rank FROM ipaddress_vote_map WHERE link_id = '" . $links["id"] . "' and ip_address = '" . $ip_address . "'";
$row = $db_handle->runQuery($query);
$up = "";
$down = "";

if(!empty($row[0]["vote_rank"])) {
	$vote_rank = $row[0]["vote_rank"];
	
	if($vote_rank == -1) {
	$up = "disabled";
	$down = "disabled";
	}
	if($vote_rank == 1) {
	$up = "disabled";
	$down = "disabled";
	}

}

?>
<input type="hidden" id="vote_rank_status-<?php echo $links["id"]; ?>" value="<?php echo $vote_rank; ?>">
<div class="btn-votes">
<input type="button" title="Up" class="up" onClick="addVote(<?php echo $links["id"]; ?>,'1')" <?php echo $up; ?> />
<div class="label-votes"><?php echo $links["votes"]; ?></div>
<input type="button" title="Down" class="down" onClick="addVote(<?php echo $links["id"]; ?>,'-1')" <?php echo $down; ?> />
</div>

</div>
<div class="desc"><?php echo $links["comments"]; ?></div>
</td>
</tr>
<?php		
}
}
?>
</tbody>
</table>
</BODY>
</HTML>

