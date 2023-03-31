// Get the form element
const contactForm = document.querySelector('#contact-form');

// Add an event listener for form submission
contactForm.addEventListener('submit', (event) => {
  // Prevent the default form submission behavior
  event.preventDefault();

  // Get the form input fields
  const nameInput = document.querySelector('#name');
  const emailInput = document.querySelector('#email');
  const messageInput = document.querySelector('#message');

  // Get the form input values
  const nameValue = nameInput.value.trim();
  const emailValue = emailInput.value.trim();
  const messageValue = messageInput.value.trim();

  // Check if the input values are valid
  if (nameValue === '' || emailValue === '' || messageValue === '') {
    alert('Please fill out all required fields.');
    return;
  }

  // Check if the email address is valid using a regular expression
  const emailRegex = /^\S+@\S+\.\S+$/;
  if (!emailRegex.test(emailValue)) {
    alert('Please enter a valid email address.');
    return;
  }

  // If all input values are valid, submit the form
  contactForm.submit();
});
