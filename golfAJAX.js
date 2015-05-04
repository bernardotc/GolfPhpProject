/**
 * Created by bernardot on 5/3/15.
 */

var request;

// Create a Request Object
function getRequestObject() {
    if (window.ActiveXObject) {
        return(new ActiveXObject("Microsoft.XMLHTTP"));
    } else if (window.XMLHttpRequest) {
        return(new XMLHttpRequest());
    } else {
        return(null);
    }
}

// Print the request response table in a div of the page
function handleResponse() {
    if (request.readyState == 4) {
        document.getElementById("results").innerHTML = request.responseText;
    }
}

function getStatistics()
{
    // Get all the data
    var data = "";
    for (x = 1; x < 19; x++) {
        data += "par" + x + "=";
        data += document.getElementsByName("par" + x)[0].value;
        data += "&";
        data += "score" + x + "=";
        data += document.getElementsByName("score" + x)[0].value;
        data += "&";
        data += "putts" + x + "=";
        data += document.getElementsByName("putts" + x)[0].value;
        data += "&";
        data += "fairway" + x + "=";
        data += document.getElementsByName("fairway" + x)[0].value;
        data += "&";
        data += "penalties" + x + "=";
        data += document.getElementsByName("penalties" + x)[0].value;
        data += "&";
    }

    // Send the data.
    request = getRequestObject();
    request.onreadystatechange = handleResponse;
    request.open("POST", "golfEstadistic.php", true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send(data);
}

// Validate if the hole is a par 3 and display the correct input values.
function checkPar(obj) {
    checkRange(obj);
    if(obj.value == 3) {
        select = obj.parentNode.parentNode.childNodes[9].childNodes[1];
        select.innerHTML = "<option value='p'>Par 3</option>";
    } else {
        select = obj.parentNode.parentNode.childNodes[9].childNodes[1];
        select.innerHTML = "<option value = 'c' >Center </option>\n<option value = 'l' > Left</option>\n<option value = 'r' > Right</option>\n<option value = 'o' > O.B. </option>\n";
    }
}

// Validate that the par of the hole is in the range of the PGA.
function checkRange(obj) {
    if (obj.value <= 2) {
        obj.value = 3;
    } else if (obj.value >= 7) {
        obj.value = 7;
    }
}

