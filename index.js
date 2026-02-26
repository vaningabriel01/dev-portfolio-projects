// const {Person} = require('./person');
const dotenv = require('dotenv');
const connectDB = require('./src/database/connect');
dotenv.config();

connectDB();
//require('./modules/path');
// // require('./modules/fs');
// // require('./modules/http');
require('./modules/express');
// const person = new Person('Gabriel', 20);

