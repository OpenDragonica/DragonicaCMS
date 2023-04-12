/* 
 * Code by Aster for Dragonica Rivals
 * var notif = document.getElementById('notification');
var passF = document.getElementById('password_form');
var webF = document.getElementById('webcash_form');
var charF = document.getElementById('my_chars');
var login_box = document.getElementById("login");
var Parr = document.getElementById("parrain");
var keep_login_box = document.getElementById("keep_login");
var charF1 = document.getElementById('char_1');var charF2 = document.getElementById('char_2');var charF3 = document.getElementById('char_3');var charF4 = document.getElementById('char_4');
var charF5 = document.getElementById('char_5');var charF6 = document.getElementById('char_6');var charF7 = document.getElementById('char_7');var charF8 = document.getElementById('char_8');
var randomimg = document.getElementById('random_btm');
var scrollup = document.getElementById('scrollup');
 * 
 */

var notif = document.getElementById('notification');
var login_box = document.getElementById('login_box');
var my_chars = document.getElementById('my_chars');
var my_passF = document.getElementById('my_passF');

function close_box(){
if (notif !== null) {notif.style.display ='none';};
if (login_box !== null) {login_box.style.display ='none';};
/*
if (passF !== null) {passF.style.display ='none';};
if (webF !== null) {webF.style.display ='none';};
if (Parr !== null) {Parr.style.display ='none';};
if (charF !== null) {charF.style.display ='none';};
if ((login_box !== null)&&(keep_login_box===null)){login_box.style.display ='none';};
if(document.getElementById("close_login")!==null){login_box.style.display ='none';};
if(keep_login_box!==null){keep_login_box.setAttribute("id", "close_login");};*/
}

function close_id(str){
document.getElementById(str).style.display ='none';
}
function open_id(str){
document.getElementById(str).style.display ='block';    
}

/*if (keep_login_box !== null) {login_box.style.display ='block';};*/
function char_edit(){
    close_id('my_passF');
    close_id('my_Coupons');
    open_id('my_chars');
}

function pass_edit(){
    open_id('my_passF');
    close_id('my_chars');
    close_id('my_Coupons');
}

function disp_coupon(){
    open_id('my_Coupons');
    close_id('my_chars');
    close_id('my_passF');
}
function disp_payasafe10(){
    close_id('paysafecard_25');
    close_id('paysafecard_50');
    open_id('paysafecard_10');
}
function disp_payasafe25(){
    close_id('paysafecard_10');
    close_id('paysafecard_50');
    open_id('paysafecard_25');
}
function disp_payasafe50(){
    close_id('paysafecard_25');
    close_id('paysafecard_10');
    open_id('paysafecard_50');
}
function clear_edit(){
  if (charF1 !== null) {charF1.style.display ='none';};
  if (charF2 !== null) {charF2.style.display ='none';};  
  if (charF3 !== null) {charF3.style.display ='none';};  
  if (charF4 !== null) {charF4.style.display ='none';};  
  if (charF5 !== null) {charF5.style.display ='none';};  
  if (charF6 !== null) {charF6.style.display ='none';};  
  if (charF7 !== null) {charF7.style.display ='none';};  
  if (charF8 !== null) {charF8.style.display ='none';};  
}
$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) { // ESC
        close_box();
    }
});


function char1_edit(){char_edit();clear_edit();charF1.style.display ='block';}
function char2_edit(){char_edit();clear_edit();charF2.style.display ='block';}
function char3_edit(){char_edit();clear_edit();charF3.style.display ='block';}
function char4_edit(){char_edit();clear_edit();charF4.style.display ='block';}
function char5_edit(){char_edit();clear_edit();charF5.style.display ='block';}
function char6_edit(){char_edit();clear_edit();charF6.style.display ='block';}
function char7_edit(){char_edit();clear_edit();charF7.style.display ='block';}
function char8_edit(){char_edit();clear_edit();charF8.style.display ='block';}

var url = window.location.href;

if (url.search("#my_passF") >= 0) {
    //found it, now do something
    pass_edit();
} 

/* 
 * Code by Aster for Dragonia Rivals
 */
function timedRefresh(timeoutPeriod) {
	setTimeout("location.reload(true);",timeoutPeriod);
}
var reload=60*60000;// (NUM*Min)
timedRefresh(reload);
/*
$(document).ready(function () {
var elem   = $('.menu.vtop');
var bottom = $(elem).position().top+$(elem).outerHeight(true);
    $(window).scroll(function () {
        if ($(this).scrollTop() > bottom) {
            scrollup.style.bottom ='10px';
            scrollup.style.opacity ='1';
            //$('#scrollup').fadeIn();
            //setTimeout(function(){scrollup.style.opacity ='1';}, 1000);
            
        } else {
            scrollup.style.bottom ='-30px';
            scrollup.style.opacity ='0';
            //$('#scrollup').fadeOut();
        }
    });
    $('#scrollup').click(function () {
        $("html, body").animate({ scrollTop: 0 }, 500);
        return false;
    });
});
*/