
function osSelectButton () {
  changeDisplay('landing-page', 'none')
  changeDisplay('os-display-page', 'block')
}

function osSelectBack () {
  changeDisplay('os-display-page', 'none')
  changeDisplay('landing-page', 'block')
}

function infoButton () {
  changeDisplay('os-display-page', 'none')
  changeDisplay('info-page', 'block')
}

function infoBack () {
  changeDisplay('info-page', 'none')
  changeDisplay('os-display-page', 'block')
}

// Enter the class name you want to select, and the value you want to change display to
function changeDisplay (name, value) {
  var elem = document.getElementsByClassName(name)
  for (var i = 0; i < elem.length; i++) {
    elem[i].style.display = value
  }
}
