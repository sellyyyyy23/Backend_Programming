const {
    index,
    insert,
    update,
    destroy,
  } = require("./controllers/FruitController.js");
  
  const main = () => {
    console.log("Menampilkan Buah : ");
    index();
    console.log("\n");
    insert("Jambu");
    console.log("\n");
    update(3, "Mengkudu");
    console.log("\n");
    destroy(1);
  };
  
  main();