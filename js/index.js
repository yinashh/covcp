// this is a messy try not the final code
// make sure you are serving the website on http://localhost/covcp
// username: puya | password: 123
var path = window.location.pathname;
var page = path.split("/").pop();
if (page === "login.html") {
    var button     = document.getElementById('loginSubmit');
    button.onclick = function (event) {
        var user = document.getElementById('username').value;
        var pass = document.getElementById('password').value;
        // this is the correct username/password
        if ((user === "puya") && (pass === "123")) {
            console.log("u got it!!");
            window.location.href = "http://localhost/covcp/index.html";
        } else {
            console.log("get outta here!!");
        }
        return false;
    };
} else {
    var pages = document.getElementById('pages');
    
    var lSearch = pages.childNodes[1].childNodes[0];
    lSearch.onclick = function (event) {
        window.location.href = "http://localhost/covcp/index.html";
    };
    
    var lReport = pages.childNodes[5].childNodes[0];
    lReport.onclick = function (event) {
        window.location.href = "http://localhost/covcp/report.html";
    };
    
    var lHelp = pages.childNodes[9].childNodes[0];
    lHelp.onclick = function (event) {
        window.location.href = "http://localhost/covcp/help.html";
    };
    
    var lLogin = pages.childNodes[13].childNodes[0];
    lLogin.onclick = function (event) {
        window.location.href = "http://localhost/covcp/login.html";
    };
}
