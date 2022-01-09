var express = require('express');
var router = express.Router();

const user = require('./user/index');
const board = require('./board/index');

router.use('/user', user);
router.use('/board', board);

module.exports = router;
