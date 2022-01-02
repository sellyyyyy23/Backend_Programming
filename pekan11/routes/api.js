const express = require("express");

const router = express.Router();

// routing untuk murid
router.get("/murid", function(req, res){
    
});

router.post("/murid", function(req, res){
    
});

router.put("/murid/:id", function(req, res){
    
});

router.delete("/murid/:id", function(req, res){
    res.send("Menghapus data murid "  + req.params.id);
});

module.exports = router;