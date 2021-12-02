document.getElementById('add').onclick = function() {
  document.getElementById('add').classList.toggle('blind');
  document.getElementById('add_form').classList.toggle('shown');
  document.getElementById('todo').classList.toggle('blind');
  document.getElementById('hide').classList.toggle('blind');
}

document.getElementById('add2').onclick = function() {
  document.getElementById('add').classList.toggle('blind');
  document.getElementById('add_form').classList.toggle('shown');
  document.getElementById('todo').classList.toggle('blind');
  document.getElementById('hide').classList.toggle('blind');
}

document.getElementById('add3').onclick = function() {
  document.getElementById('add').classList.toggle('blind');
  document.getElementById('add_form').classList.toggle('shown');
  document.getElementById('todo').classList.toggle('blind');
  document.getElementById('hide').classList.toggle('blind');
}


document.getElementById('cancel').onclick = function() {
  document.getElementById('add').classList.toggle('blind');
  document.getElementById('add_form').classList.toggle('shown');
  document.getElementById('todo').classList.toggle('blind');
  document.getElementById('hide').classList.toggle('blind');
}


let body = document.body;
let sidebar = document.querySelector('.sidebar')
let menubutton = document.querySelector('#menubutton')

menubutton.addEventListener('click', function(e) {
  sidebar.classList.toggle('open')
});

body.addEventListener('click', function (e) {
  if (e.target !== menubutton && !sidebar.contains(e.target)) {
    sidebar.classList.remove('open')
  }
})



