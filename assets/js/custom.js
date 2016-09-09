$(document).ready(function() {

    $("#cancel-reg").click(function() {
        window.location.replace("http://www.stoursquashclub.co.uk/pages/view/home");
    });

    $("#cancel-login").click(function() {
        window.location.replace("http://www.stoursquashclub.co.uk/pages/view/home");
    });

    $(".delete-submit").click(function() {
     return confirm("You are about to delete a user - are you sure you wish to do this?");
    });

    $("a.refresh").click(function() {
                    jQuery.ajax({
                        type: "POST",
                        url: "captcha_refresh",
                        success: function(res) {
                            if (res)
                            {
                                  jQuery("div.image").html(res);
                            }
                        }
                    });
                });

    });
