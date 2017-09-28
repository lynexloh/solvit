  <!-- Main Header -->
 <?php 
 
 
 $post ="active";
  $tag = "Post A Problem";
 
 
 include("head.php");
  
  
  
  ?>
  <style type="text/css">
       @import url("http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.min.css")
    </style>
 
<style>
 
.image-preview-input {
    position: relative;
    overflow: hidden;
    margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
	position: absolute;
	top: 0;
	right: 0;
	margin: 0;
	padding: 0;
	font-size: 20px;
	cursor: pointer;
	opacity: 0;
	filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
 .animated {
    			-webkit-transition: height 0.2s;
				-moz-transition: height 0.2s;
				transition: height 0.2s;
			}
</style>
  
  
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo $status?></a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search For User">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Navigation</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="starter.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li>
          <a href="profile.php">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li>
		<li >
          <a href="order.php">
            <i class="fa fa-shopping-cart"></i> <span>Order</span>
          </a>
        </li>
        <li class="active treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="solvit.php"><i class="fa fa-circle-o"></i>SolvIT</a></li>
            <li><a href="solvit2.php"><i class="fa fa-circle-o"></i>Questions</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Post
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
			  
			<form method="post" action="postAnswer.php" enctype ="multipart/form-data">
                    <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                            

                        <div id="div_id_username" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> Title:<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_username" maxlength="30" name="title" placeholder="Title" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                       <div id="div_id_name" class="form-group required">
                             <label for="id_name" class="control-label col-md-4  requiredField"> Product Type:<span class="asteriskField"></span> </label>
                             <div class="controls col-md-8 ">
							  <select name="type" class="selectpicker" data-size="5" style="display: none;">
							  <option value="Computer">Computer</option>
							  <option value="Mobile">Mobile</option>
							  <option value="Other">Others</option>
						  </select>
						  	  
                            </div>
                        </div>
						
						</br></br></br>
                        <div id="div_id_password1" class="form-group required">
                            <label for="id_password1" class="control-label col-md-4  requiredField"> Brand / Modal:<span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="id_password1" name="modal" placeholder="Brand / Modal" style="margin-bottom: 10px" type="text" />
                            </div>
                        </div>
                        <div id="div_id_password2" class="form-group required">
                             <label for="id_password2" class="control-label col-md-4  requiredField"> Problem:<span class="asteriskField"></span> </label>
                             <div class="controls col-md-8 ">
							  <select name="problem" class="selectpicker" data-size="5" style="display: none;">
							  <option value="Hardware">Hardware</option>
							  <option value="Software">Software</option>
							 
						  </select>
						  	  
                            </div>
                        </div>
				
                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Repair Method:<span class="asteriskField"></span> </label> 
                            <div class="controls col-md-8 "> 
								 <select name ="method" class="selectpicker" data-size="5" style="display: none;">
							  <option value="Onsite">Onsite Support</option>
							  <option value="Offsite">Offsite Support</option>
							 
						  </select>
                            </div>
                        </div>
						
                       <div id="div_id_name" class="form-group required"> 
							 <div style="margin-top:20px" class="controls col-md-offset-4 col-md-12">
							 
							  <label for="id_name"  requiredField"> Further description on the problem:<span class="asteriskField"></span> </label> 
								
							 </div>
					   
                            <div class="col-lg-12">
								 <div class="well well-lg">
									  <div class="media1">													
												   <div class="form-group" style="padding:12px;">
													<textarea name ="description" class="form-control animated" placeholder="Maximum length is 256 words"></textarea>
												  
												   </div>
											   
								
							  </div>
										</div>  <!-- well-sm -->
							</div>
                        </div>
                      <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Attach image:<span class="asteriskField"></span> </label> 
                          <div class="controls col-md-8 ">
						  <!-- image-preview-filename input [CUT FROM HERE]-->
							<div class="input-group image-preview">
								<input type="text" class="form-control image-preview-filename" disabled="disabled"> <!-- don't give a name === doesn't send on POST/GET -->
								<span class="input-group-btn">
									<!-- image-preview-clear button -->
									<button type="button" class="btn btn-default image-preview-clear" style="display:none;">
										<span class="glyphicon glyphicon-remove"></span> Clear
									</button>
									<!-- image-preview-input -->
									<div class="btn btn-default image-preview-input">
										<span class="glyphicon glyphicon-folder-open"></span>
										<span class="image-preview-input-title">Browse</span>
										<input type="file" accept="image/png, image/jpeg, image/gif"  name="file" id="image"/> <!-- rename it -->
									</div>
								</span>
							</div><!-- /input-group image-preview [TO HERE]--> 				  
						  </div>
                        </div>	
					 
					 
                     
							
                           
                            <div style="padding-top:10px" class="controls col-md-12">
                                <input type="submit" name="post" value="Post" class="btn btn-primary btn btn-info"/>
								<input type="button" name="back" onclick="location.href='solvit.php';" style="float:right" value="Back" class="btn btn btn-danger" id="button-id-signup" />
                            </div>							
               

                </form>
				
    </section>
	
            <!-- /.box-body -->
          </div>
          <br><br><br><br><br>
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

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
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

<!-- AdminLTE App -->


<script src="js/myprofile.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

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
	
<script src="dist/js/app.min.js"></script>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.5.4/bootstrap-select.js"/>
  <script>
    		$(function(){
				$('.normal').autosize();
				$('.animated').autosize({append: "\n"});
			});
		</script>
<script type="text/javascript">
$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
<script type="text/javascript">
      window.onload=function(){
      $('.selectpicker').selectpicker();
     
      $('.ex-disable').click(function() {
          $('.disable-example').prop('disabled',true);
          $('.disable-example').selectpicker('refresh');
      });
      $('.ex-enable').click(function() {
          $('.disable-example').prop('disabled',false);
          $('.disable-example').selectpicker('refresh');
      });

 
      $('.scrollMe .dropdown-menu').scrollyou();

      prettyPrint();
      };
    </script>
    			
<script type="text/javascript">
/*!
    Autosize v1.18.1 - 2013-11-05
	Automatically adjust textarea height based on user input.
	(c) 2013 Jack Moore - http://www.jacklmoore.com/autosize
	license: http://www.opensource.org/licenses/mit-license.php
*/
(function ($) {
	var
	defaults = {
		className: 'autosizejs',
		append: '',
		callback: false,
		resizeDelay: 10
	},

	// border:0 is unnecessary, but avoids a bug in Firefox on OSX
	copy = '<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',

	// line-height is conditionally included because IE7/IE8/old Opera do not return the correct value.
	typographyStyles = [
		'fontFamily',
		'fontSize',
		'fontWeight',
		'fontStyle',
		'letterSpacing',
		'textTransform',
		'wordSpacing',
		'textIndent'
	],

	// to keep track which textarea is being mirrored when adjust() is called.
	mirrored,

	// the mirror element, which is used to calculate what size the mirrored element should be.
	mirror = $(copy).data('autosize', true)[0];

	// test that line-height can be accurately copied.
	mirror.style.lineHeight = '99px';
	if ($(mirror).css('lineHeight') === '99px') {
		typographyStyles.push('lineHeight');
	}
	mirror.style.lineHeight = '';

	$.fn.autosize = function (options) {
		if (!this.length) {
			return this;
		}

		options = $.extend({}, defaults, options || {});

		if (mirror.parentNode !== document.body) {
			$(document.body).append(mirror);
		}

		return this.each(function () {
			var
			ta = this,
			$ta = $(ta),
			maxHeight,
			minHeight,
			boxOffset = 0,
			callback = $.isFunction(options.callback),
			originalStyles = {
				height: ta.style.height,
				overflow: ta.style.overflow,
				overflowY: ta.style.overflowY,
				wordWrap: ta.style.wordWrap,
				resize: ta.style.resize
			},
			timeout,
			width = $ta.width();

			if ($ta.data('autosize')) {
				// exit if autosize has already been applied, or if the textarea is the mirror element.
				return;
			}
			$ta.data('autosize', true);

			if ($ta.css('box-sizing') === 'border-box' || $ta.css('-moz-box-sizing') === 'border-box' || $ta.css('-webkit-box-sizing') === 'border-box'){
				boxOffset = $ta.outerHeight() - $ta.height();
			}

			// IE8 and lower return 'auto', which parses to NaN, if no min-height is set.
			minHeight = Math.max(parseInt($ta.css('minHeight'), 10) - boxOffset || 0, $ta.height());

			$ta.css({
				overflow: 'hidden',
				overflowY: 'hidden',
				wordWrap: 'break-word', // horizontal overflow is hidden, so break-word is necessary for handling words longer than the textarea width
				resize: ($ta.css('resize') === 'none' || $ta.css('resize') === 'vertical') ? 'none' : 'horizontal'
			});

			// The mirror width must exactly match the textarea width, so using getBoundingClientRect because it doesn't round the sub-pixel value.
			function setWidth() {
				var style, width;
				
				if ('getComputedStyle' in window) {
					style = window.getComputedStyle(ta, null);
					width = ta.getBoundingClientRect().width;

					$.each(['paddingLeft', 'paddingRight', 'borderLeftWidth', 'borderRightWidth'], function(i,val){
						width -= parseInt(style[val],10);
					});

					mirror.style.width = width + 'px';
				}
				else {
					// window.getComputedStyle, getBoundingClientRect returning a width are unsupported and unneeded in IE8 and lower.
					mirror.style.width = Math.max($ta.width(), 0) + 'px';
				}
			}

			function initMirror() {
				var styles = {};

				mirrored = ta;
				mirror.className = options.className;
				maxHeight = parseInt($ta.css('maxHeight'), 10);

				// mirror is a duplicate textarea located off-screen that
				// is automatically updated to contain the same text as the
				// original textarea.  mirror always has a height of 0.
				// This gives a cross-browser supported way getting the actual
				// height of the text, through the scrollTop property.
				$.each(typographyStyles, function(i,val){
					styles[val] = $ta.css(val);
				});
				$(mirror).css(styles);

				setWidth();

				// Chrome-specific fix:
				// When the textarea y-overflow is hidden, Chrome doesn't reflow the text to account for the space
				// made available by removing the scrollbar. This workaround triggers the reflow for Chrome.
				if (window.chrome) {
					var width = ta.style.width;
					ta.style.width = '0px';
					var ignore = ta.offsetWidth;
					ta.style.width = width;
				}
			}

			// Using mainly bare JS in this function because it is going
			// to fire very often while typing, and needs to very efficient.
			function adjust() {
				var height, original;

				if (mirrored !== ta) {
					initMirror();
				} else {
					setWidth();
				}

				mirror.value = ta.value + options.append;
				mirror.style.overflowY = ta.style.overflowY;
				original = parseInt(ta.style.height,10);

				// Setting scrollTop to zero is needed in IE8 and lower for the next step to be accurately applied
				mirror.scrollTop = 0;

				mirror.scrollTop = 9e4;

				// Using scrollTop rather than scrollHeight because scrollHeight is non-standard and includes padding.
				height = mirror.scrollTop;

				if (maxHeight && height > maxHeight) {
					ta.style.overflowY = 'scroll';
					height = maxHeight;
				} else {
					ta.style.overflowY = 'hidden';
					if (height < minHeight) {
						height = minHeight;
					}
				}

				height += boxOffset;

				if (original !== height) {
					ta.style.height = height + 'px';
					if (callback) {
						options.callback.call(ta,ta);
					}
				}
			}

			function resize () {
				clearTimeout(timeout);
				timeout = setTimeout(function(){
					var newWidth = $ta.width();

					if (newWidth !== width) {
						width = newWidth;
						adjust();
					}
				}, parseInt(options.resizeDelay,10));
			}

			if ('onpropertychange' in ta) {
				if ('oninput' in ta) {
					// Detects IE9.  IE9 does not fire onpropertychange or oninput for deletions,
					// so binding to onkeyup to catch most of those occasions.  There is no way that I
					// know of to detect something like 'cut' in IE9.
					$ta.on('input.autosize keyup.autosize', adjust);
				} else {
					// IE7 / IE8
					$ta.on('propertychange.autosize', function(){
						if(event.propertyName === 'value'){
							adjust();
						}
					});
				}
			} else {
				// Modern Browsers
				$ta.on('input.autosize', adjust);
			}

			// Set options.resizeDelay to false if using fixed-width textarea elements.
			// Uses a timeout and width check to reduce the amount of times adjust needs to be called after window resize.

			if (options.resizeDelay !== false) {
				$(window).on('resize.autosize', resize);
			}

			// Event for manual triggering if needed.
			// Should only be needed when the value of the textarea is changed through JavaScript rather than user input.
			$ta.on('autosize.resize', adjust);

			// Event for manual triggering that also forces the styles to update as well.
			// Should only be needed if one of typography styles of the textarea change, and the textarea is already the target of the adjust method.
			$ta.on('autosize.resizeIncludeStyle', function() {
				mirrored = null;
				adjust();
			});

			$ta.on('autosize.destroy', function(){
				mirrored = null;
				clearTimeout(timeout);
				$(window).off('resize', resize);
				$ta
					.off('autosize')
					.off('.autosize')
					.css(originalStyles)
					.removeData('autosize');
			});

			// Call adjust in case the textarea already contains text.
			adjust();
		});
	};
}(window.jQuery || window.$)); // jQuery or jQuery-like library, such as Zepto
</script> 
</body>
</html>
