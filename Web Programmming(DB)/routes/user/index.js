const express = require('express');
const router = express.Router();
const controller = require('./user.controller');

/* GET home page. */
router.get('/join_form', (req, res) => {
    var path = res.req.originalUrl.substring(1) ;
    res.render(path);
});
router.get('/login_form', (req, res) => {
    var path = res.req.originalUrl.substring(1) ;
    res.render(path);
});
router.get('/profile_mod_form', (req, res) => {
    var path = res.req.originalUrl.substring(1) ;
    console.log(path);
    res.render(path);
});
router.get('/logout_proc', (req, res) => {
    req.app.locals.id = null;
    req.app.locals.password = null;
    req.app.locals.nickname = null;
    req.app.locals.email = null;

    res.redirect('/');
});

router.post('/login_proc', controller.login_proc);
router.post('/join_proc', controller.join_proc);
router.post('/profile_mod_proc', controller.profile_mod_proc);

router.get('/a', controller.main);
module.exports = router;