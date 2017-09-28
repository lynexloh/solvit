
<?php 

	$tag ="Reply";
	include("head1.php");		
	
		$id = $_SESSION['userSession'];
	$db_handle = new DBController();	
					$post = $_GET['post'];
						//Fetch all the data from the package.
                     $query = "SELECT * FROM post WHERE post_ID like $post";

                     $data = $db_handle->runQuery($query);

                     foreach ($data as $key ) {
						$topic = $key['title'];
						$method = $key['method'];
						$type1 = $key['type'];
						$image = $key['image'];
						$date = $key['date'];
						$writer = $key['user_ID'];
					 $problem = $key['problem'];
					  $name = $key['modal'];
					 }			
					 //$orderP = $db_handle->runQuery("SELECT post_ID from product");
					
						//$orderP = $sth->fetchAll();
						
			
                	$query1 = "SELECT expert_ID,checkIn FROM product WHERE post_ID like $post";

					 $expert =0;
							$check =0;
                     $data1 = $db_handle->runQuery($query1);
					 if (is_array($data1)) {
					foreach ($data1 as $key1) {
						$expert =$key1['expert_ID'];
						$check= $key1['checkIn'];
					}
					 }
  ?>

<style>
<!--
body{width:610;}
.demo-table {width: 100%;border-spacing: initial;margin: 20px 0px;word-break: break-word;table-layout: auto;line-height:1.8em;color:#333;}
.demo-table th {background: #81CBFD;padding: 5px;text-align: left;color:#FFF;}
.demo-table td {border-bottom: #f0f0f0 1px solid;background-color: #ffffff;padding: 5px;}
.demo-table td div.feed_title{text-decoration: none;color:#333;font-weight:bold;}
.demo-table ul{margin:0;padding:0;}
.demo-table li{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:20px;}
.demo-table .highlight, .demo-table .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;} -->

.btn-votes {float:left; padding: 0px 5px;cursor:pointer;}
.btn-votes input[type="button"]{width:32px;height:32px;border:0;cursor:pointer;}
.up {background:url('up.png')}
.up:disabled {background:url('up_off.png')}
.down {background:url('down.png')}
.down:disabled {background:url('down_off.png')}
.label-votes {font-size:1.0em;color:#40CD22;width:32px;height:32px;text-align:center;font-weight:bold;}
.desc {float:right;color:#999;width:90%;}

</style>
	<script>
/* vote.js */
function addVote(id,vote_rank) {
	
	$.ajax({
	url: "add_vote.php",
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

    <link rel="stylesheet" href="lib/jquery.upvote.css">
	<!--
	   <script type="text/javascript">
        function gen(target, cssClass, params) {
            var obj = $('#templates .upvote').clone();
            obj.addClass(cssClass);
            $(target).append(obj);
            return obj.upvote(params);
        }

        $(function() {
                function gen_examples(params) {
                    gen('#examples', '', params);
                }
                function gen_unix(params) {
                    gen('#unix', 'upvote-unix', params);
                }
                function gen_programmers(params) {
                    gen('#programmers', 'upvote-programmers', params);
                }
                function gen_serverfault(params) {
                    gen('#serverfault', 'upvote-serverfault', params);
                }
                var functions = [gen_examples, gen_unix, gen_programmers, gen_serverfault];
                for (var i in functions) {
                    var fun = functions[i];
                    fun();
                   
                }
        });	
    </script>  
	
	IDs have to be unique - try

function gen_examples(params) {
  params = params || "";
  $(".examples").each(function() {
    gen(this, '', params);
  });
}
or to simplify your whole loading:

var params = "....";
$(function() {

  $(".examples").each(function() {
    gen(this, '', params);
  });
  gen('#unix', 'upvote-unix', params);
  gen('#programmers', 'upvote-programmers', params);
  gen('#serverfault', 'upvote-serverfault', params);
});
	
	
	
	-->
	
	
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Question
      </h1>
      <ol class="breadcrumb">
        <li><a href="member_panel"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Order Viewer</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row (Stat box) -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
     
			  <section class="content">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    <table class="table table-striped">
        <thead>
          </thead>
		 
          <tbody>
		  
          <tr class="active">    
            <td><div class = "col-sm-6 col-md-2">
      <a  class = "thumbnail">
        <img src = "<?php echo $image ?>" alt = "Generic placeholder thumbnail">
      </a>
   </div><strong><?php echo $topic?></strong><br/>Product Type: <?php echo $type1?></a><br/>By: <a href="cancel.php"><?php	$query = "SELECT * FROM user where user_ID = $writer";
                     $data = $db_handle->runQuery($query);
			 foreach ($data as $key ) {
				 echo $key['user_Name'];	

						
			 }?></a></td>
   
            <td><strong>Date</strong><br/><?php echo $date?><br/><br/></td>
			
			<!-- accept button starts here -->
			<td>        
			
			<?php

			//$ids = array_column($orderP, 'post_ID');
			//$idarray = (in_array($post,$ids));

					 
					$queries = "SELECT method FROM post WHERE post_ID like $post";
                     $datas = $db_handle->runQuery($queries);

                     foreach ($datas as $keys ) {
						$method= $keys['method'];
					 }

			if ($expert !=$id && $id != $writer && $type == 'Technician' && $check != 1 && $method != 'Offsite'){
	
					?>
					<form method="post" action="book.php">  
					 <input name = "postID" type = "hidden" value="<?php echo $post; ?>">
					  <input name = "userID" type = "hidden" value="<?php echo $id; ?>">
					   <input name = "writerID" type = "hidden" value="<?php echo $writer; ?>">
					     <input name = "method" type = "hidden" value="<?php echo $method; ?>">
					   <input name = "type" type = "hidden" value="<?php echo $type1; ?>">
					      <input name = "topic" type = "hidden" value="<?php echo $topic; ?>">
						    <input name = "problem" type = "hidden" value="<?php echo $problem; ?>">
							<input name = "name" type = "hidden" value="<?php echo $name; ?>">
			<button type="submit" name="accept"  class="[ btn btn-primary active ]" data-loading-text="Loading..." >Accept</button>
					
				</form>
					<?php
				
			}
			else{
				?>
				
				
				<a href="#"><button type="submit" class="[ btn btn-primary disabled]" data-loading-text="Loading..." disabled>Accept</button></a>
				<?php
		
			}
			
			?>
			
			
			
		
			
			
			
			
		
			
			</td>
          </tr>   
        </tbody>
      </table>
	   <div class="panel panel-default widget">
		
	   
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment">  COMMENTS</span>
     
            </div>
            <div class="panel-body">
                <ul class="list-group">

		  <?php 
				$q = "SELECT * FROM links WHERE post_ID = $post";

                     $data = $db_handle->runQuery($q);
					 
					 
					if(!empty($data)) {
					$ip_address = $_SERVER['REMOTE_ADDR'];
					
					
					// for each start here
                     foreach ($data as $keylog ) {
										 

						$uid = $keylog["user_ID"];
			
                   ?>
				  
				
				      <li class="list-group-item">
					
                        <div class="row">
						
						<!-- xs means phone md means desktop-->
				<div class="col-xs-3 col-md-1">
					
					<div class="examples" id="examples"></div>
					<div id="links-<?php echo $keylog["id"]; ?>">
<input type="hidden" id="votes-<?php echo $keylog["id"]; ?>" value="<?php echo $keylog["votes"]; ?>">
<?php

$us = $keylog["user_ID"];


$vote_rank = 0;
$query ="SELECT SUM(vote_rank) as vote_rank FROM ipaddress_vote_map WHERE link_id = '" . $keylog["id"] . "' and ip_address = '" . $ip_address . "'";
$row = $db_handle->runQuery($query);

if($id == $us){
	
$up = "disabled";
$down = "disabled";	
	
}
else{
$up = "";
$down = "";
}

//if login id is same as the reply id

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
<input type="hidden" id="vote_rank_status-<?php echo $keylog["id"]; ?>" value="<?php echo $vote_rank; ?>">
<div class="btn-votes">
<input type="button" title="Up" class="up" onClick="addVote(<?php echo $keylog["id"]; ?>,'1')" <?php echo $up; ?> />
<div class="label-votes"><?php echo $keylog["votes"]; ?></div>
<input type="button" title="Down" class="down" onClick="addVote(<?php echo $keylog["id"]; ?>,'-1')" <?php echo $down; ?> />
</div>

</div>
					
					
					
					</div>
						<!--description here -->
			</br>
                            <div class="col-xs-6 col-md-1">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle img-responsive" alt="" /></div>
								
		 
                            <div class="col-xs-12 col-md-3">
				      <div>
					  
				         <div class="comment-text">
                                    <h4><?php $ids = $keylog["reply_ID"];
														
										$number1 = "SELECT * FROM reply where id = $ids";
										 $number2 = $db_handle->runQuery($number1);
								 foreach ($number2 as $key4 ) {
									 echo $key4['comments'];			 
								 }			
									
									
									?></h4>
                                </div>    
                                    <div class="mic-info">
                                        By: <a href="expert.php"><?php $ID = $keylog['user_ID'];
			$query = "SELECT * FROM user where user_ID = $ID";
                     $data = $db_handle->runQuery($query);
			 foreach ($data as $key1 ) {
				 echo $key1['user_Name'];			 
			 }
			 
			 
			?></a> on <?php echo $key4['date'];?>
                                    </div>
                                </div>
				   
				      </div>
							
					
							
                              </br>  
                                                 
                            </div>
				   
				     </li>
                     <!-- end of description -->
                  </br>
              
         
				<?php
                  }
				  // for each end here
							}
				  
				  
                  ?>		  
   </div>
  
     
                    
                </ul>
                
            </div>
            <div class="col">


                    <div class="panel-body">
					
					<?php
						 $query2 = "SELECT method FROM post WHERE post_ID like $post";

                     $data2 = $db_handle->runQuery($query2);

                     foreach ($data2 as $key2 ) {
						$method2= $key2['method'];
					 }
					 
					 if($method2 =="Offsite"){
					
					?>
					<form method="post"  role="form" action="reply.php">  
						<fieldset>
                                <div class="form-group">
								 <input name = "postID" type = "hidden" value="<?php echo $post; ?>">
								<textarea name="reply" class="form-control" rows="3" placeholder="Comment" required autofocus=""></textarea>
                                </div>           
                        <button name="post" type="submit" class="[ btn btn-success ]" data-loading-text="Loading...">Post reply</button>
                            </fieldset>
								</form>
					
					<?php
					 }
					 else{
						 
						 
					 }
					 					
					?>
					
					
					
                     
                    </div>
                        </div>

                </div>
     </div>
    </section>
            <!-- /.box-body -->
          </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /main .row -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>


<!--
    <div id="templates" class="hidden">
        <div class="upvote">
            <a class="upvote" title="This is good stuff. Vote it up! (Click again to undo)"></a>
            <span class="count" title="Total number of votes"></span>
            <a class="downvote" title="This is not useful. Vote it down. (Click again to undo)"></a>
            <a class="star" title="Mark as favorite. (Click again to undo)"></a>
        </div>
    </div>-->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-1.12.3.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- REQUIRED JS SCRIPTS -->

	 <script src="js/jquery-3.1.0.min.js"></script>
<script src="js/myprofile.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

    <script src="lib/jquery.upvote.js"></script>
<script src="js/myprofile.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="js/bootstrap/bootstrap.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- SBC App -->
	<script type="text/javascript" src="scripts/style.js"></script>
	<script type="text/javascript" src="scripts/custom.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="css/htmlfromrss.js"></script>

		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>	


	
</body>
</html>
