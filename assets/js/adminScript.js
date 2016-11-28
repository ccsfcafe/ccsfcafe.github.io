//
var oauth = false; //are we using oauth to authenticate admin
var landingpage = "adminCafeteria.php";
var user1 = "admin1";
var user1pass = "password";
function instaProcess() {
    if (oauth) {
        OAuth.initialize('');
        var clientname = "";
        //redirect to login with instagram
        window.location.assign("https://api.instagram.com/oauth/authorize/?client_id=clientname&redirect_uri=landingpage&response_type=token");
        
        return;
    }

//not using oauth to authenticate
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (username == user1 && password == user1pass) { 

        window.location.assign(landingpage);

    }else{
        //if wrong password, clear password
        var password = document.getElementById("password").value = "";
    }
}

