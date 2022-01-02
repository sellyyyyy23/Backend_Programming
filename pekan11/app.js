const express = require("express");
const app = express();

const router = require("./routes/api");
app.use(router);

const port = 3000;
app.listen(port, () => {
    console.log(`server berjalan di : http://localhost:${port}`);
  });



