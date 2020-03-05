const name = document.getElementById('name')
const email = document.getElementById('email')
const password = document.getElementById('password')
const passwordConfirm = document.getElementById('passwordConfirm')
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

  if(password.value != passwordConfirm.value)
  {
    messages.push('Wachtwoorden zijn niet hetzelfde')
  }

  if(name.value.includes("[") || name.value.includes("]") || name.value.includes("(") || name.value.includes(")") || name.value.includes("/") || name.value.includes("\\"))
  {
    message.push("De gebruikersnaam mag deze karrakters niet bevatten:[]()/\\");
  }

  if(messages.length > 0)
  {
    e.preventDefault();
    errorElement.innerText = messages.join(', ')
  }
})
