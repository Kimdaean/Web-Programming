const express = require('express');
const router = express.Router();
const controller = require('./board.controller');

var multer = require('multer');  //multer 모듈 import
const upload = multer({
    storage: multer.diskStorage({
        destination: function (req, file, cb) {
            cb(null, 'public/images/');
        },
        filename: function (req, file, cb) {
            cb(null, file.originalname);
        }
    }),
});


/* GET home page. */
router.get('/upload_form', (req, res) => {
    var path = res.req.originalUrl.substring(1) ;
    res.render(path);
});



router.post('/upload_proc', upload.single('file'), controller.upload_proc);
router.get('/list', controller.list);
router.get('/mod_form',  controller.mod_form);
router.post('/mod_proc',  controller.mod_proc);
router.get('/del_proc',  controller.del_proc);
router.get('/detail',  controller.detail);
router.post('/add_comment',  controller.add_comment);
module.exports = router;