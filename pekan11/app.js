const express = require("express");
const router = require("./routes/api");

const app = express();

const port = 3000;
app.listen(port, () => {
    console.log(`server berjalan di : http://localhost:${port}`);
  });

app.use(express.json());
app.use(router);
  

  