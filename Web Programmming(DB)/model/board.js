var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var commentSchema = new Schema({
    contents: String,
    comment_date: {type: Date, default: Date.now()}
});

var boardSchema = new Schema({
    title: String,
    contents: String,
    author: String,
    board_date: {type: Date, default: Date.now()},
    file: String,
    comments: [commentSchema]
});

module.exports = mongoose.model('board', boardSchema);
