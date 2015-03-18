function populate_field(){

window.onload=function() {
  function querySt(ji) {

    hu = window.location.search.substring(1);
    gy = hu.split("&");

    for (i=0; i < gy.length; i++) {
        ft = gy[i].split("=");
        if (ft[0] == ji) {
            return ft[1];
        }
    }
  }

  var email = querySt("email");

  if (email) {
    document.getElementById('mce-EMAIL').value = email;
  }
};

}
