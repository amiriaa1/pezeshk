//[Javascript]



$(function () {
    "use strict";   

	
    //Alerts
    $(".myadmin-alert .closed").click(function(event) {
        $(this).parents(".myadmin-alert").fadeToggle(350);
        return false;
    });
    /* onload to close */
    $(".myadmin-alert-onload").onload(function(event) {
        $(this).fadeToggle(350);
        return false;
    });
    $(".showtop").onload(function() {
        $(".alerttop").fadeToggle(350);
    });
    $(".showtop2").onload(function() {
        $(".alerttop2").fadeToggle(350);
    });
    /** Alert Position Bottom  **/
    $(".showbottom").onload(function() {
        $(".alertbottom").fadeToggle(350);
    });
    $(".showbottom2").onload(function() {
        $(".alertbottom2").fadeToggle(350);
    });
    /** Alert Position Top Left  **/
    $("#showtopleft").onload(function() {
        $("#alerttopleft").fadeToggle(350);
    });
    /** Alert Position Top Right  **/
    $("#showtopright").onload(function() {
        $("#alerttopright").fadeToggle(350);
    });
    /** Alert Position Bottom Left  **/
    $("#showbottomleft").onload(function() {
        $("#alertbottomleft").fadeToggle(350);
    });
    /** Alert Position Bottom Right  **/
    $("#showbottomright").onload(function() {
        $("#alertbottomright").fadeToggle(350);
    });
	
  }); // End of use strict