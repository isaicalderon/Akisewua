<?php 
	require 'php/conexion.php';
	require 'php/isLogin.php'; 

	if(isset($_POST['search'])){ // este es isset para el button
		$valueToSearch = $_POST['search-text']; // valor del input buscar
		$categoria = $_POST['radioButton'];
		$tmp = "";
		if ($categoria > 0) {
			//echo "<script>alert('Entre categoria: ".$categoria."')</script>";
			$tmp = "AND Categoria = ".$categoria;
		}

		//echo "<script>alert('Entre al isset')</script>";
		$search = "SELECT * FROM productos WHERE descripcion LIKE '%".$valueToSearch."%' ".$tmp." ORDER BY alto DESC";
	}else{
		$search = "SELECT * FROM productos ORDER BY alto DESC";
	}

?>
 
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="img/index/logo.jpg">

        <title>Aki sewua</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- fontawesome core CSS -->
		<link href="fontawesome-free-5.0.13/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/productos.css" rel="stylesheet">
        <link href="css/admin.css" rel="stylesheet">
        <link href="css/carousel.css" rel="stylesheet">
		<link href="css/index.css" rel="stylesheet">
		<link href="css/modal-login.css" rel="stylesheet">
        <link href="css/dialog.css" rel="stylesheet">
        <link href="css/dialog-sandra.css" rel="stylesheet">
        <link href="css/ns-default.css" rel="stylesheet">
        <link href="css/ns-style-growl.css" rel="stylesheet">
        <script src="js/modernizr.custom.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		
    </head>
    <body>
        <header>
            <?php include 'nav.php'; ?>
        </header>

        <main class="cd-main-content">
        <div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
			</div> <!-- cd-tab-filter -->
		</div> <!-- cd-tab-filter-wrapper -->

        <div class="cd-filter">
			<form action="productos.php" method="POST"> 
        		<div class="cd-filter-block">
					<h4>Categorias</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".1" type="radio" name="radioButton" class="menu" value='0' id="1" checked>
							<label class="radio-label" for="1">Todo</label>
						</li>

						<li>
							<input class="filter" data-filter=".2" type="radio" name="radioButton" class="menu" value='1' id="2">
							<label class="radio-label" for="2">Vestidos</label>
						</li>

						<li>
							<input class="filter" data-filter=".3" type="radio" name="radioButton" class="menu" value='2' id="3">
							<label class="radio-label" for="3">Blusas</label>
						</li>
		    			<li>
							<input class="filter" data-filter=".4" type="radio" name="radioButton" class="menu" value='3' id="4">
							<label class="radio-label" for="4" >Rebosos</label>
						</li>
						<li>
							<input class="filter" data-filter=".5" type="radio" name="radioButton" class="menu" value='4' id="5">
							<label class="radio-label" for="5" >Artesanías</label>
						</li>
						<li>
							<input class="filter" data-filter=".radio6" type="radio" name="radioButton" id="6" value='5'>
							<label class="radio-label" for="6" >Máscaras</label>
						</li>
					</ul> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->
        
				<div class="cd-filter-block">
					<h4>Buscador</h4>
					<!-- <form action="productos.php" method="POST"> -->
						<div class="cd-filter-content">
	                        <div class="search-container" >
							    <input type="search" name="search-text" id="search-text" placeholder="Buscar">
	                            <button type="submit" name="search" value="filter"><i class="fa fa-search"></i></button>
	                        </div>
						</div> <!-- cd-filter-content -->
					<!-- </form> -->
				</div> <!-- cd-filter-block -->
			</form>
            <a href="#" class="cd-close"><i class="fas fa-times"></i></a>

		</div> <!-- cd-filter -->

        <div class="cd-gallery bg-light" style="padding: 0">
        <a href="#" class="cd-filter-trigger">Filtros</a>
                <div class="container">
                    <div class="row abs" id="11">
                        <?php 
                            $query = mysqli_query($con, $search)or die(mysqli_error($con));
                            $queryx = mysqli_query($con, $search)or die(mysqli_error($con));
                            
                            $rowx = mysqli_fetch_array($queryx, MYSQLI_ASSOC);
                            if($rowx['ID'] > 0){
                            	while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	                                echo "
	                                    <div class='col-md-4'>
	                                        <div class='card mb-4 box-shadow'>
	                                            <img class='card-img-top' src='".$row['url_img']."' data-holder-rendered='true' style='height:".$row['alto']."px; width: 100%; display: block;'>
												<div class='card-body'>
												<h4 class='mb-1' style='text-align:center'>$".$row['precio'].".00 USD</h4>
												<p class='card-text mb-3'>".$row['Descripcion']."</p>
	                                                <div class='d-flex justify-content-between align-items-center'>
	                                                    <div class='btn-group'>
	                                                        <form action='php/addCar.php' method='POST'>
	                                                        <button type='submit' class='btn btn-sm btn-outline-secondary'><i class='fas fa-cart-plus'></i> Carro</button>
	                                                        <input name='id_prod' value='".$row['ID']."' style='visibility:hidden;display:none'>
	                                                        <button type='button' class='btn btn-sm btn-outline-secondary'> ❤ Wish</button>
	                                                        </form>
	                                                    </div>
	                                                    <small class='text-muted'>0 ❤ </small>
	                                                </div>
	                                            </div>
	                                        </div>
	                                    </div>
	                                ";
	                            }
                            }else{
                            	echo "
                            	<div class='col-md-4'>
                            		<h3>No se ha encontrado nada</h3>
                            	</div>
                            	<br><br>
                            	";
                            }

                        ?>
                    </div>
					
                </div>  
            </div>


            <!-- FOOTER -->
            <footer class="container">
                <p class="float-right"><a href="#">Arriba</a></p>
                <p>&copy; Developers of Aki sewua, Inc. &middot; <a href="#">Privacidad</a> &middot; <a href="#">Terminos y condiciones</a>
                &middot; <a href="mapa.php">Mapa</a></p>
            </footer>
        </main>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster 
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        -->

		<script>
			$(document).ready(function(e){
				var last = 1;
				<?php 
				if (@$_POST['prod']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#15').attr('class','row abs');
					";
				}
				if (@$_POST['prod_pen']!=""||@$_GET['prod_pen']!="") {
					echo "
						$('#11').attr('class','row abs block');
						$('#12').attr('class','row abs');
						last = 2;
					";
				}
			 	?>
				$(".menu").click(function(e){
					var id = e.target.id;
					$("#1"+last).attr("class","row abs block");
					last = id;
					$("#1"+id).attr("class","row abs");
				});
			});
		</script>

        <script type="text/javascript">
        	jQuery(document).ready(function($){
				//open/close lateral filter
				$('.cd-filter-trigger').on('click', function(){
					triggerFilter(true);
				});
				$('.cd-filter .cd-close').on('click', function(){
					triggerFilter(false);
			});

			function triggerFilter($bool) {
				var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
				elementsToTrigger.each(function(){
					$(this).toggleClass('filter-is-visible', $bool);
				});
			}

			//mobile version - detect click event on filters tab
			var filter_tab_placeholder = $('.cd-tab-filter .placeholder a'),
				filter_tab_placeholder_default_value = 'Select',
				filter_tab_placeholder_text = filter_tab_placeholder.text();
	
			$('.cd-tab-filter li').on('click', function(event){
				//detect which tab filter item was selected
				var selected_filter = $(event.target).data('type');
					
				//check if user has clicked the placeholder item
				if( $(event.target).is(filter_tab_placeholder) ) {
					(filter_tab_placeholder_default_value == filter_tab_placeholder.text()) ? filter_tab_placeholder.text(filter_tab_placeholder_text) : filter_tab_placeholder.text(filter_tab_placeholder_default_value) ;
					$('.cd-tab-filter').toggleClass('is-open');

				//check if user has clicked a filter already selected 
				} else if( filter_tab_placeholder.data('type') == selected_filter ) {
					filter_tab_placeholder.text($(event.target).text());
					$('.cd-tab-filter').removeClass('is-open');	

				} else {
					//close the dropdown and change placeholder text/data-type value
					$('.cd-tab-filter').removeClass('is-open');
					filter_tab_placeholder.text($(event.target).text()).data('type', selected_filter);
					filter_tab_placeholder_text = $(event.target).text();
					
					//add class selected to the selected filter item
					$('.cd-tab-filter .selected').removeClass('selected');
					$(event.target).addClass('selected');
				}
			});
			
			//close filter dropdown inside lateral .cd-filter 
			$('.cd-filter-block h4').on('click', function(){
				$(this).toggleClass('closed').siblings('.cd-filter-content').slideToggle(300);
			})

			//fix lateral filter and gallery on scrolling
			$(window).on('scroll', function(){
				(!window.requestAnimationFrame) ? fixGallery() : window.requestAnimationFrame(fixGallery);
			});

			function fixGallery() {
				var offsetTop = $('.cd-main-content').offset().top,
					scrollTop = $(window).scrollTop();
				( scrollTop >= offsetTop ) ? $('.cd-main-content').addClass('is-fixed') : $('.cd-main-content').removeClass('is-fixed');
			}

			buttonFilter.init();
			$('.cd-gallery ul').mixItUp({
			    controls: {
			    	enable: false
			    },
			    callbacks: {
			    	onMixStart: function(){
			    		$('.cd-fail-message').fadeOut(200);
			    	},
			      	onMixFail: function(){
			      		$('.cd-fail-message').fadeIn(200);
			    	}
			    }
			});

			//search filtering
			//credits https://codepen.io/edprats/pen/pzAdg
			var inputText;
			var $matching = $();

			var delay = (function(){
				var timer = 0;
				return function(callback, ms){
					clearTimeout (timer);
				    timer = setTimeout(callback, ms);
				};
			})();

			$(".cd-filter-content input[type='search']").keyup(function(){
			  	// Delay function invoked to make sure user stopped typing
			  	delay(function(){
			    	inputText = $(".cd-filter-content input[type='search']").val().toLowerCase();
			   		// Check to see if input field is empty
			    	if ((inputText.length) > 0) {            
			      		$('.mix').each(function() {
				        	var $this = $(this);
				        
				        	// add item to be filtered out if input text matches items inside the title   
				        	if($this.attr('class').toLowerCase().match(inputText)) {
				          		$matching = $matching.add(this);
				        	} else {
				          		// removes any previously matched item
				          		$matching = $matching.not(this);
				        	}
			      		});
			      		$('.cd-gallery ul').mixItUp('filter', $matching);
			    	} else {
			      		// resets the filter to show all item if input is empty
			      		$('.cd-gallery ul').mixItUp('filter', 'all');
			    	}
			  	}, 200 );
			});
		});

		/*****************************************************
			MixItUp - Define a single object literal 
			to contain all filter custom functionality
		*****************************************************/
		var buttonFilter = {
		  	// Declare any variables we will need as properties of the object
		  	$filters: null,
		  	groups: [],
		  	outputArray: [],
		  	outputString: '',
		  
		  	// The "init" method will run on document ready and cache any jQuery objects we will need.
		  	init: function(){
		    	var self = this; // As a best practice, in each method we will asign "this" to the variable "self" so that it remains scope-agnostic. We will use it to refer to the parent "buttonFilter" object so that we can share methods and properties between all parts of the object.
		    
		    	self.$filters = $('.cd-main-content');
		    	self.$container = $('.cd-gallery ul');
		    
			    self.$filters.find('.cd-filters').each(function(){
			      	var $this = $(this);
			      
				    self.groups.push({
				        $inputs: $this.find('.filter'),
				        active: '',
				        tracker: false
				    });
			    });
			    
			    self.bindHandlers();
		  	},
		  
		  	// The "bindHandlers" method will listen for whenever a button is clicked. 
		  	bindHandlers: function(){
		    	var self = this;

		    	self.$filters.on('click', 'a', function(e){
			      	self.parseFilters();
		    	});
			    self.$filters.on('change', function(){
			      self.parseFilters();           
			    });
		  	},
		  
		  	parseFilters: function(){
			    var self = this;
			 
			    // loop through each filter group and grap the active filter from each one.
			    for(var i = 0, group; group = self.groups[i]; i++){
			    	group.active = [];
			    	group.$inputs.each(function(){
			    		var $this = $(this);
			    		if($this.is('input[type="radio"]') || $this.is('input[type="checkbox"]')) {
			    			if($this.is(':checked') ) {
			    				group.active.push($this.attr('data-filter'));
			    			}
			    		} else if($this.is('select')){
			    			group.active.push($this.val());
			    		} else if( $this.find('.selected').length > 0 ) {
			    			group.active.push($this.attr('data-filter'));
			    		}
			    	});
			    }
			    self.concatenate();
		  	},
		  
		  	concatenate: function(){
		    	var self = this;
		    
		    	self.outputString = ''; // Reset output string
		    
			    for(var i = 0, group; group = self.groups[i]; i++){
			      	self.outputString += group.active;
			    }
		    
			    // If the output string is empty, show all rather than none:    
			    !self.outputString.length && (self.outputString = 'all'); 
			
		    	// Send the output string to MixItUp via the 'filter' method:    
				if(self.$container.mixItUp('isLoaded')){
			    	self.$container.mixItUp('filter', self.outputString);
				}
		  	}
		};
	//# sourceURL=pen.js
	</script>


        <script>window.jQuery || document.write('<script src="js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="js/vendor/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="js/vendor/holder.min.js"></script>
        <!-- -->
        <script src="js/grayscale.min.js"></script>
        <script src="js/classie.js"></script>
        <script src="js/dialogFx.js"></script>
        <script>
            (function() {
                var dlgtrigger = document.querySelector( '[data-dialog]' ),
                somedialog = document.getElementById( dlgtrigger.getAttribute( 'data-dialog' ) ),
                dlg = new DialogFx( somedialog );
                dlgtrigger.addEventListener( 'click', dlg.toggle.bind(dlg) );
            })();

        </script>
        <script src="js/notificationFx.js"></script>
        <script>
            <?php if(@$_POST['mensaje']!=""){ ?>
            // create the notification
            var notification = new NotificationFx({
            message : '<p><?php echo @$_POST['mensaje'];?></p>',
            layout : 'growl',
            effect : 'jelly',
            type : 'notice', // notice, warning, error or success

            });

            // show the notification
            notification.show();
            <?php } ?>
        </script>
    </body>
</html>