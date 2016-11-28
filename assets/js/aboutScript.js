function clearText(){
    document.getElementById('commentText').value="";
    document.getElementById('commentText').style="color:black";

}
function processComment(){
    var http = new XMLHttpRequest();
    var url = "https://www.google.com/recaptcha/api/siteverify";
    var params = "secret=6LfeJw0UAAAAAA7e4-ddd6nrY7MIpRivDc_Hst2b&response="+encodeuri(document.getElementById('CommentText').value);//"lorem=ipsum&name=binny";
    http.open("POST", url, true);

    //Send the proper header information along with the request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var res=JSON.parse(http.responseText);
            if(res.success){
                //store to file
            }else{
                //resend params with new captcha
            }
        }
    }
    http.send(params);
}
/*
{
  "success": true|false,
  "challenge_ts": timestamp,  // timestamp of the challenge load (ISO format yyyy-MM-dd'T'HH:mm:ssZZ)
  "hostname": string,         // the hostname of the site where the reCAPTCHA was solved
  "error-codes": [...]        // optional
}*/