//Import data students
const students = require("../data/students");

// buat class Student Controller
class StudentController {
    index(req, res) {
        const data = {
            message: "Menampilkan semua students",
            data: students,
          };
      
          res.json(data);
    }
    store(req, res) {
        const {nama} = req.body;

        students.push(nama);

        const data = {
        message: `Menambahkan Data Student: ${nama}`,
        data: students,
        };

        res.json(data);
    }
    
      update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;

        students[id] = nama;
        const data = {
        message: `Mengubah Student id ${id}, nama ${nama}`,
        data: students,
        };

        res.json(data);
    }
    
      destroy(req, res) {
        const {id} = req.params;
        students.splice(id, 1);
        const data = {
        message: `Menghapus Student id ${id}`,
        data: students,
        };

        res.json(data);
        }
}

const object = new StudentController()

module.exports = object;
