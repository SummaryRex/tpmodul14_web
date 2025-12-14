const express = require("express");
const filmRoutes = require("./routes/filmRoutes");

const app = express();
app.use(express.json());
app.use("/films", filmRoutes);

module.exports = app;
