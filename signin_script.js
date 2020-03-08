const email = document.getElementById('email')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
  let messages = [];
  if(password.value.length < 8)
  {
    messages.push('Een wachtwoord moet minstens 8 karrakters lang zijn')
  }

  if(password.value.length > 45)
  {
    messages.push('Een wachtwoord mag maximum 45 karrakters lang zijn')
  }

  if(messages.length > 0)
  {
    e.preventDefault();
    errorElement.innerText = messages.join(', ')
  }
})
