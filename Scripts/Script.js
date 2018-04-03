
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
function addDevice () {
  changeDisplay('landing-page', 'none')
  changeDisplay('add-device-page', 'block')
}

function editButton () {
  changeDisplay('info-page', 'none')
  changeDisplay('edit-page', 'block')
}

function addDeviceBack () {
  changeDisplay('add-device-page', 'none')
  changeDisplay('landing-page', 'block')
  changeDisplay('edit-page', 'none')
}

// Enter the class name you want to select, and the value you want to change display to
function changeDisplay (name, value) {
  var elem = document.getElementsByClassName(name)
  for (var i = 0; i < elem.length; i++) {
    elem[i].style.display = value
  }
}
