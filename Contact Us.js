const form = document.getElementById('contactForm');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent the form from submitting

  const firstName = document.getElementById('firstname').value;
  const lastName = document.getElementById('lastname').value;
  const email = document.getElementById('email').value;
  const message = document.getElementById('message').value;

  console.log(`First Name: ${firstName}`);
  console.log(`Last Name: ${lastName}`);
  console.log(`Email: ${email}`);
  console.log(`Message: ${message}`);

  // You can now use the retrieved data to send an email or perform any other action
});