var mongoose = require('mongoose');
var Schema = mongoose.Schema;


var userSchema = new Schema({
    id: String,
    password: String,
    nickname: String,
    email: String
});

module.exports = mongoose.model('user', userSchema);
