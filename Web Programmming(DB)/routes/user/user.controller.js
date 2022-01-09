var mongoose = require('mongoose');
var User = require('../../model/user');

function connectDB(){
    var uri = "mongodb://localhost:27017/database";
    mongoose.connect(uri, { useUnifiedTopology: true, useNewUrlParser: true });

    const connection = mongoose.connection;
      console.log('aaa')
    connection.once("open", function() {
        console.log("MongoDB database connection established successfully");
    });
}

exports.join_proc = (req, res, next) => {
    connectDB();

    var user = new User();
    user.id = req.body.id;
    user.password = req.body.password;
    user.nickname = req.body.nickname;
    user.email = req.body.email;
    console.log(user)

    user.save(function (err) {
        if(err){
            console.log(err);
            return;
        }
        else{
            console.log(user.id + 'join success')
        }
    });
    res.redirect('/');
}
exports.login_proc = (req, res, next) => {
    connectDB();

    User.findOne({id: req.body.id, password: req.body.password}, function (err, user) {
        if(err){
            console.log('Fail!');
            console.log(err);
            res.redirect('/');

        }
        console.log(user);
        if(user != null){

            req.app.locals.id = user.id;
            req.app.locals.password = user.password;
            req.app.locals.nickname = user.nickname;
            req.app.locals.email = user.email;

            res.redirect('/');

        } else {
            res.redirect('/');
        }
    });
}
exports.profile_mod_proc = (req, res, next) => {
    connectDB();

    User.findOneAndUpdate({id: req.body.id},{ $set:{password: req.body.password, nickname: req.body.nickname, email:req.body.email} }, function (err, user) {
        if(err){
            console.log('Fail!');
            console.log(err);
            res.redirect('/');

        }
        req.app.locals.id = user.id;
        req.app.locals.password = req.body.password;
        req.app.locals.nickname = req.body.nickname;
        req.app.locals.email = req.body.email;

        res.redirect('/');
    });
}
exports.main = (req, res, next) => {
    connectDB();
   // console.log(req);
    console.log(res.req.originalUrl);
    var path = res.req.originalUrl.substring(1) ;
    res.render(path);
}