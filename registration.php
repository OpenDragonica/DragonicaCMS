<?php 
$ptitle="Registration";
$psubtitle="Compte";
@include('config.php');
@include('link_map.php');
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <style>
                .error-msg.checked{
                    background-color:transparent;
                    display: none !important;
                }
            </style>
	</head>
	<body class="no-slider">
	<!-- <body class="has-top-menu"> -->
		<div id="top-layer">
		<div id="header-top">  
		<header id="header">
			                          	
				<div class="wrapper">					
								<?php include_once("includes/Menu_Bottom.php"); ?>									
				</div>
			
		</header>
		</div>
			<section id="content">
                            <div id="logo">
                                <a href="./"><div class="logo_hydra"></div></a>
                            </div>
					<div id="menu-bottom">
					<?php include_once("includes/Menu_Bottom.php"); ?>
					</div>

					<div class="wrapper">
						<div class="header-breadcrumbs">
							<?php include_once("includes/page_location.php"); ?>
						</div>
					</div>
					
				</header>
				<div id="main-box">
					<div class="mainContent boxCenter">
					<div class="top_mainContent bg_mainContent"><h1 class="text-center title">REGISTER</h1></div>
					
					<div class="box_mainContent bg_mainContent">			
                                            <?php include_once("includes/signup.php"); ?>
					</div>
					<div class="bottom_mainContent bg_mainContent "></div>
					</div>
					
					<div class="clear-float"></div>
					
				</div>
			</section>
		</div>
			
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
                        <?php include_once("includes/footer.php"); ?>
		</div>
                <?php @include("includes/popups.php"); ?>
		<?php include_once("jscript/includes_noslider.php"); ?>
<script type="text/javascript" src="jscript/jquery.validate.min.js"></script>
<script type="text/javascript" src="jscript/additional-methods.min.js"></script>
                <script type="text/javascript">
jQuery.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^[a-zA-Z0-9]+$/.test(value);
}); 
$( "#newuser" ).validate({
	rules: {
		signup_username: {required: true, minlength: 3, alphanumeric: true},
		signup_password: {required: true, minlength: 6},
		signup_password_r: {equalTo: "#signup_password"},
		signup_email: {email: true, required: true}		
	},
	messages: {
		signup_username: {
			required: "Entrez un nom d'utilisateur",
			minlength: jQuery.format("Entrez au moins {0} charactères"),
			alphanumeric: "Les caractères spéciaux ne sont pas autorisés"
		},
		signup_password: {
			required: "Entrez un mot de passe",
			minlength: jQuery.format("Entrez au moins {0} caractères dont au moins 1 chiffre")
		},
		signup_password_r: {
			equalTo: "Le mot de passe n'est pas identique"
		},
		signup_email: {
			required: "L'email saisie n'est pas valide",
			email: "L'email saisie n'est pas valide"
		}
		},
        // the errorPlacement has to take the table layout into account
        errorPlacement: function(error, element) {
        	if ( element.is(":radio") )
        		error.appendTo( element.parent().next().next() );
        	else if ( element.is(":checkbox") )
        		error.appendTo ( element.next() );
        	else
        		error.appendTo( element.parent().next() );
        },
            // set this class to error-labels to indicate valid fields
            success: function(label) {
            // set &nbsp; as text for IE
            label.html("&nbsp;").addClass("checked");
        },
        highlight: function(element, errorClass) {
        	$(element).parent().next().find("." + errorClass).removeClass("checked");
        }
    });
	function validate(){
    var rules2 = document.getElementById('signup_rules');
    if (rules2.checked){
    }else{
        alert("Vous devez accepter le réglement pour vous inscrire.")
    }
}
</script>
	</body>
</html>