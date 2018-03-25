function switchButton() {
  changeDisplay('landing-page', 'none')
  changeDisplay('switch-page', 'block')
}

function databaseButton() {
  changeDisplay('landing-page', 'none')
  changeDisplay('database-page', 'block')
}

function cancelButton() {
  changeDisplay('database-page', 'none')
  changeDisplay('switch-page', 'none')
  changeDisplay('landing-page', 'block')
}

// Enter the clas name you want to select, and the value you want to change display to
function changeDisplay (name, value) {
  var elem = document.getElementsByClassName(name)
  for (var i = 0; i < elem.length; i++) {
    elem[i].style.display = value
  }
}
