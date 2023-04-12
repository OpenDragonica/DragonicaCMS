<?php
require_once("data/db.php");
require_once("data/function.php");	
	
// lire le formulaire provenant du système PayPal et ajouter 'cmd'
$req = 'cmd=_notify-validate';
foreach ($_POST as $key => $value) {
$value = urlencode(stripslashes($value));
$req .= "&$key=$value";
}

// post back to PayPal system to validate
// Test : $target_paypal = "sandbox.paypal";
// Production : 
$target_paypal = "ipnpb.paypal";
//$target_paypal = "sandbox.paypal";
$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
$header .= "Host: ".$target_paypal.".com:443\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
$fp = fsockopen ('ssl://'.$target_paypal.'.com', 443, $errno, $errstr, 30);


$item_name = $_POST['item_name'];
$item_number = $_POST['item_number'];
$payment_status = $_POST['payment_status'];
$payment_amount = $_POST['mc_gross'];
$payment_currency = $_POST['mc_currency'];
$txn_id = $_POST['txn_id'];
$receiver_email = $_POST['receiver_email'];
$payer_email = $_POST['payer_email'];
$id_user = $_POST['custom'];
$checkTXNID= VerifIXNID($txn_id);

if (!$fp) {
//header("Location:buycash.php?msg=4No&FP");exit();
// ERREUR HTTP
} else {        fputs ($fp, $header . $req);
		while (!feof($fp)) {
		$res = fgets ($fp, 1024);

                if (strcmp ($res, "VERIFIED")== 0){// transaction valide
			// vérifier que payment_status a la valeur Completed
                if ( $payment_status == "Completed") {
                    // vérifier que txn_id n'a pas été précédemment traité: Créez une fonction qui va interroger votre base de données
                    if ($checkPIN[0] == 0) {
                        // vérifier que receiver_email est votre adresse email PayPal principale
                        if ( "goodgamesdgn@gmail.com" == $receiver_email) {
                            // vérifier que payment_amount et payment_currency sont corrects
							if ( $payment_currency == "EUR"){// traiter le paiement
								//TEST
                                //if( $payment_amount ==1.00){Paypal_addCashWEB($id_user, 1000,"TEST-$txn_id");$payment_amount=0;}else {}
								//5EUR
								if( $payment_amount ==5.00){Paypal_addCashWEB($id_user, 5,$txn_id);$payment_amount=0;}else {}
								//10EUR
								if( $payment_amount ==10.00){Paypal_addCashWEB($id_user, 10,$txn_id);$payment_amount=0;}else {}
								//20EUR
								if( $payment_amount ==20.00){Paypal_addCashWEB($id_user, 20,$txn_id);$payment_amount=0;}else {}
								//40EUR
								if( $payment_amount ==40.00){Paypal_addCashWEB($id_user, 40,$txn_id);$payment_amount=0;}else {}
								//60EUR
								if( $payment_amount ==60.00){Paypal_addCashWEB($id_user, 60,$txn_id);$payment_amount=0;}else {}
								//80EUR
								if( $payment_amount ==80.00){Paypal_addCashWEB($id_user, 80,$txn_id);$payment_amount=0;}else {}
								//100EUR
								if( $payment_amount ==100.00){Paypal_addCashWEB($id_user, 100,$txn_id);$payment_amount=0;}else {}
								//150EUR
								if( $payment_amount ==150.00){Paypal_addCashWEB($id_user, 150,$txn_id);$payment_amount=0;}else {}
								//200EUR
								if( $payment_amount ==200.00){Paypal_addCashWEB($id_user, 200,$txn_id);$payment_amount=0;}else {}
								//350EUR
								if( $payment_amount ==350.00){Paypal_addCashWEB($id_user, 350,$txn_id);$payment_amount=0;}else {}
								//500EUR
								if( $payment_amount ==500.00){Paypal_addCashWEB($id_user, 500,$txn_id);$payment_amount=0;}else {}
							}else { Paypal_addCashWEB($id_user, 0,"Pas en euros");}
                            
                         }
			  else {
				// Mauvaise adresse email paypal
                              Paypal_addCashWEB($id_user, 0,"MauvaisEmail");
			  }
			}
			else {	 //ID de transaction déjà utilisé
			//	Paypal_addCash($id_user, 0,"TXNiD Used");
                            Paypal_addCashWEB($id_user, 0,"TXNID utilis�");
					}
			}
		  else {
		        	// Statut de paiement: Echec
				Paypal_addCashWEB($id_user, 0,"Paiement Echou�");
		  }
		}
                //else if (stripos ($res, "INVALID") !== false) {
                else if (strcmp ($res, "INVALID")== 0){
		//else if (strcmp (trim($res), "INVALID") == 0) {
			// Transaction invalide
                        Paypal_addCashWEB($id_user, 0,"Transaction invalide");
		}
                else  {
		//else if (strcmp (trim($res), "INVALID") == 0) {
			// Transaction invalide
                        //Paypal_addCash($id_user, 0,"Pas de statut res $res");
		}
	}
	fclose ($fp);
}


































?>