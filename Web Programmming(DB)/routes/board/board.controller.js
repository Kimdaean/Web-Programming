var mongoose = require('mongoose');
var Board = require('../../model/board');
var Comment = require('../../model/comment');

function connectDB(){
    var uri = "mongodb://localhost:27017/database";
    mongoose.connect(uri, { useUnifiedTopology: true, useNewUrlParser: true });

    const connection = mongoose.connection;

    connection.once("open", function() {
        console.log("MongoDB database connection established successfully");
    });
}

exports.upload_proc = (req, res, next) => {
    connectDB();

    var board = new Board();

    //console.log(req);
    board.title = req.body.title;
    board.contents = req.body.contents;
    board.author = req.body.author;
    // board.file = req.file.filename;

    board.save(function (err) {
        if(err){
            console.log(err);
            res.redirect('/');
        }
        else {
            res.redirect('/');
        }
    });
}
exports.list = (req, res, next) => {
    connectDB();
    console.log(typeof req.query.q === 'undefined');
    if(typeof req.query.q === 'undefined'){
        Board.find({}, function (err, board) {

            if(err){
                console.log(err);
                res.redirect('/');
            }
            else {
                var path = req._parsedOriginalUrl.pathname.substring(1) ;
                res.render(path, {board: board, q:''});
            }
        });
    } else {
        Board.find({title:{$regex: req.query.q}}, function (err, board) {
            if(err){
                console.log(err);
                res.redirect('/');
            }
            else {
                var path = req._parsedOriginalUrl.pathname.substring(1) ;
                res.render(path, {board: board, q:req.query.q});
            }
        });
    }


}
exports.mod_form = (req, res, next) => {
    connectDB();
    //console.log(req);
    Board.findOne({_id: req.query.id}, function (err, board) {
        if(err){
            console.log(err);
            res.redirect('/');
        }
        else {
            console.log(board);
            var path = req._parsedOriginalUrl.pathname.substring(1) ;
            res.render(path, {board: board});
        }
    });
}
exports.mod_proc = (req, res, next) => {
    connectDB();

    Board.findOneAndUpdate({_id: req.body.id},{ $set:{title: req.body.title, contents: req.body.contents, author:req.body.author} }, function (err, user) {
        if(err){
            console.log('Fail!');
            console.log(err);
            res.redirect('/');

        } else {
            res.redirect('/board/list');
        }

    });
}
exports.del_proc = (req, res, next) => {
    connectDB();

    Board.deleteOne({_id: req.query.id}, function (err) {
        if(err){
            console.log('Fail!');
            console.log(err);
            res.redirect('/');

        } else {
            res.redirect('/board/list');
        }

    });
}
exports.detail = (req, res, next) => {
    connectDB();
    //console.log(req);
    Board.findOne({_id: req.query.id}, function (err, board) {
        if(err){
            console.log(err);
            res.redirect('/');
        }
        else {
            console.log(board);
            var path = req._parsedOriginalUrl.pathname.substring(1) ;
            res.render(path, {board: board});
        }
    });
}
exports.add_comment = (req, res, next) => {
    connectDB();

    var comment = new Comment();
    comment.contents = req.body.contents;


    Board.findOneAndUpdate({_id: req.body.id},{ $push:{comments: comment} }, function (err, user) {
        if(err){
            console.log('Fail!');
            console.log(err);
            res.redirect('/');

        } else {
            res.redirect('/board/list');
        }

    });
}