// buat class
class StudentController {
    index(req, res) {
        res.send("Menampilkan data murid");
      }
    store(req, res) {
        res.send("Menambahkan data murid");
      }
    
      update(req, res) {
        res.send("Mengedit data murid " + req.params.id);
      }
    
      destroy(req, res) {
        res.send("Menghapus data murid "  + req.params.id);
      }
}
