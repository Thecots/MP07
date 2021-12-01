console.clear();
require('colors');
const express = require('express');
const exphbs = require("express-handlebars");
const fs = require('fs');
const path = require('path');

const app = express();

/* ---- handlebars ----- */
app.set("views", path.join(__dirname, "views"));
app.engine(
  ".hbs",
  exphbs({
    helpers: {
      foo: function (v1,v2) { return (v1 == v2) ? options.fn(this) : options.inverse(this); },

    },
    defaultLayout: "main",
    extname: ".hbs",
    partialsDir: __dirname + "/views/layouts",
  })
);
app.set("view engine", ".hbs");

/* ---- settings ----- */
app.use(express.json());
app.use(express.urlencoded({extended: true}));
app.use(express.static(path.join(__dirname,'public')));

/* ----- routes ----- */
app.use(require('./routes/index'));

/* ----- server ----- */
app.listen(5050, () => {
    console.log('http://localhost:5050'.green);
})