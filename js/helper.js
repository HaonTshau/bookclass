
function modify_iframe_page(url) {
    document.getElementById("content").src = url
}

function getFormValue(name){
    var formcontent = $(".form-inline").serializeArray();
    for (var i = formcontent.length - 1; i >= 0; i--) {
        if (formcontent[i]['name'] == name) {
            return formcontent[i]['value'];
        }
    }
    return '';
}

function getParamValue(paramName)
{
    var url = window.location.search.substring(1); //get rid of "?" in querystring
    var qArray = url.split('&'); //get key-value pairs
    for (var i = 0; i < qArray.length; i++) 
    {
        var pArr = qArray[i].split('='); //split key and value
        if (pArr[0] == paramName) 
            return pArr[1]; //return value
    }
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

