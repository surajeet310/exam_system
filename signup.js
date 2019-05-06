function signup(desig_value){
  if (desig_value == 1) {
    document.getElementById('roll').style.display = 'none';
    document.getElementById('number').style.display = 'none';
    document.getElementById('semester').style.display = 'none';
  }
  if(desig_value == 2){
    document.getElementById('roll').style.display = 'block';
    document.getElementById('number').style.display = 'block';
    document.getElementById('semester').style.display = 'block';
  }
}

function startpage(){
  document.getElementById('roll').style.display = 'none';
  document.getElementById('number').style.display = 'none';
  document.getElementById('semester').style.display = 'none';
}
