$(document).ready(function(){

$('#profilephoto').on( "click", function() {
  	 $('#profile_post').fadeOut(1);
	$('#upload_form').fadeIn(500);
});

// var aa = function() {
// 	$('#profile_post').hide();
// 	console.log("form switch working.");


// 	// continue button after upload for success
// }

});
//CHANGE PROFILE PHOTO USER LOGIC

//1. CLICK ON THE PROFILE PICTURE

//2. CHOOSE A PHOTO FROM COMPUTER

//3. SUBMIT THE PICTURE TO CHANGE THE CURRENT PHOTO

// $("#profilephoto")

//CHANGE PROFILE PHOTO PROGRAMMING LOGIC

//1. USER NEEDS A WAY TO CLICK ON THE PROFILE IMAGE

//2. USER NEEDS A WAY TO CHOOSE A PROFILE IMAGE FROM COMPUTER

//3. PROFILE IMAGE NEEDS TO UPDATE BASED UPON WHICH IMAGE USER CHOSE. TRY TO USE AJAX IF POSSIBLE



$( "#dataTable tbody tr" ).on( "click", function() {
  alert( $( this ).text() );
});

