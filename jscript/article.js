(function($){
$(document).ready(function(){  
  
    //how much items per page to show  
    var show_per_page = 10;  
    //getting the amount of elements inside content div  
    var number_of_items = $('#li_list').children().size();  
    //calculate the number of pages we are going to have  
    var number_of_pages = Math.ceil(number_of_items/show_per_page);  
  
    //set the value of our hidden input fields  
    $('#current_page').val(0);  
    $('#show_per_page').val(show_per_page);  
  
    //now when we got all we need for the navigation let's make it '  
  
    /* 
    what are we going to have in the navigation? 
        - link to previous page = previous_link
        - links to specific pages = next_link
        - link to next page 
        -BUTTON =onclick
    
    */  
    var navigation_html = '<a class="previous_link" href="javascript:previous();"><button class="left previous_link">&lt;</button></a>';  //Prev
    var current_link = 0;  
    while(number_of_pages > current_link){  
        navigation_html += '<a class="page-num" style="margin-left: 1px;margin-right: 1px;" href="javascript:go_to_page(' + current_link +')" longdesc="' + current_link +'">'+ (current_link + 1) +'</a>';  
        current_link++;  
    }  
    navigation_html += '<a class="next_link" href="javascript:next();"><button class="right next_link">&gt;</button></a>';  //Next
	
    $('#page_navigation').html(navigation_html);  
  
    //add active_page class to the first page link  
    $('#page_navigation .page-num:first').addClass('current');  
  
    //hide all the elements inside content div  
    $('#li_list').children().css('display', 'none');  
  
    //and show the first n (show_per_page) elements  
    $('#li_list').children().slice(0, show_per_page).css('display', 'block');  
  
}); 
})(jQuery);  
function previous(){  
  
    new_page = parseInt($('#current_page').val()) - 1;  
    //if there is an item before the current active link run the function  
    if($('.current').prev('.page-num').length==true){  
        go_to_page(new_page);  
    }  
  
}  
  
function next(){  
    new_page = parseInt($('#current_page').val()) + 1;  
    //if there is an item after the current active link run the function  
    if($('.current').next('.page-num').length==true){  
        go_to_page(new_page);  
    }  
  
}  
function go_to_page(page_num){  
    //get the number of items shown per page  
    var show_per_page = parseInt($('#show_per_page').val());  
  
    //get the element number where to start the slice from  
    start_from = page_num * show_per_page;  
  
    //get the element number where to end the slice  
    end_on = start_from + show_per_page;  
  
    //hide all children elements of content div, get specific items and show them  
    $('#li_list').children().css('display', 'none').slice(start_from, end_on).css('display', 'block');  
  
    /*get the page link that has longdesc attribute of the current page and add active_page class to it 
    and remove that class from previously active page link*/  
    $('.page-num[longdesc=' + page_num +']').addClass('current').siblings('.current').removeClass('current');  
  
    //update the current page input field  
    $('#current_page').val(page_num);  
}  