const Joi = require('joi');
const schema = Joi.object({
  firstName: Joi.string().required(),
  lastName: Joi.string().required(),
  email: Joi.string().email().required(),
  message: Joi.string().required()
});
app.post('/submit-form', (req, res) => {
  const { firstName, lastName, email, message } = req.body;

  const { error } = schema.validate({ firstName, lastName, email, message });

  if (error) {
    return res.status(400).send(error.details[0].message);
  }

  res.send('Form submitted successfully!');
});
const validator = require('validator');

app.post('/submit-form', (req, res) => {
  const { firstName, lastName, email, message } = req.body;

  const errors = [];

  if (!validator.isLength(firstName, { min: 2, max: 50 })) {
    errors.push('First name must be between 2 and 50 characters');
  }

  if (!validator.isLength(lastName, { min: 2, max: 50 })) {
    errors.push('Last name must be between 2 and 50 characters');
  }

  if (!validator.isEmail(email)) {
    errors.push('Email is not valid');
  }

  if (!validator.isLength(message, { min: 10, max: 1000 })) {
    errors.push('Message must be between 10 and 1000 characters');
  }

  if (errors.length > 0) {
    return res.status(400).json({ errors });
  }

  res.send('Form submitted successfully!');
});