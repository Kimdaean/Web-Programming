var createError = require('http-errors');
var express = require('express');
var path = require('path');
var bodyParser = require('body-parser');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var session = require('express-session');



const app = express();


var userRouter = require('./routes/user');
var boardRouter = require('./routes/board');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser.urlencoded({extended:false}));
app.use(bodyParser.json());
app.use(session({
  resave: false,
  saveUninitialized: false,
  secret: 'secret',
  cookie: {
    httpOnly: true,
    secure: false,
  },
}));

// view engine setup
app.set('views', './views');
app.engine('ejs', require('ejs').renderFile);
app.set('view engine', 'ejs');

app.use('/user', userRouter);
app.use('/board', boardRouter);

app.listen(4000, (req, res) => {
  console.log('listen 4000 port');
});

app.get('/', (req, res) => {
  //res.send('express.js로 만든 server입니다.');
  res.render('index');
});

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  console.log(res);
  res.render('error');
});

//module.exports = app;
