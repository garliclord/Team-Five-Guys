// To be called when the page loads, gets the current user and displays it
function startUpFunction () {
  var currentUser = loadCurrentUser()
  displayCurrentUser(currentUser)
}

// Gets the current user from the backend
function loadCurrentUser () {
  var username = 'Bryce'
  return username
}

// Changes the h1 at the top of the screen to display the current user
function displayCurrentUser (userName) {
  document.getElementById('currentUser').innerHTML = 'Current user: ' + userName
}

// To be called when the switch button is pressed
// Displays the switch page
function loadSwitchPage () {
  changeDisplay('landing-page', 'none')
  changeDisplay('switch-page', 'block')
}

function loadSearchPage () {
  changeDisplay('landing-page', 'none')
  changeDisplay('search-page', 'block')
}

// To be called when the cancel button is pressed, changes the display of all page divs to 'none'
// and turns the landing-page div display to 'block'
function cancelButton () {
  changeDisplay('search-page', 'none')
  changeDisplay('switch-page', 'none')
  changeDisplay('landing-page', 'block')
}

// To be called when the user clicks 'Confirm' on the switch page
// Will take the data inputted into the 'username' field, change the current user to it
// And also call the displayCurrentUser() function
function switchConfirmButton () {
  var name = document.getElementById('usernameInput').value
  document.getElementById('usernameInput').value = ''
  // In the future this will also call the fucntion whcih rewrites and saves the current username, but that isn't made yet
  var currentUser = name
  displayCurrentUser(currentUser)
  changeDisplay('switch-page', 'none')
  changeDisplay('landing-page', 'block')
}

function searchConfirm() {
  changeDisplay('search-landing-page', 'none')
  changeDisplay('search-confirm-page', 'block')
}

function searchSpecsDisplay () {
  changeDisplay('search-confirm-page', 'none')
  changeDisplay('search-specs-page', 'block')
}
// Enter the class name you want to select, and the value you want to change display to
function changeDisplay (name, value) {
  var elem = document.getElementsByClassName(name)
  for (var i = 0; i < elem.length; i++) {
    elem[i].style.display = value
  }
}
