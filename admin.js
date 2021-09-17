var xhr = createRequest();
function getData(dataSource, ctntClass, aSearch) {
 if(xhr) {
 var obj = document.getElementsByClassName(ctntClass)[0];
 var requestbody ="bsearch="+encodeURIComponent(aSearch);
 xhr.open("POST", dataSource, true);
 xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
 xhr.onreadystatechange = function() {
 if (xhr.readyState == 4 && xhr.status == 200) {
 obj.innerHTML = xhr.responseText;
 }
 }
xhr.send(requestbody);
 }
}
