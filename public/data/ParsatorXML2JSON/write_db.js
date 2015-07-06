var express = require('express');
var morgan = require('morgan');             // log requests to the console (express4)
var bodyParser = require('body-parser');    // pull information from HTML POST (express4)
var app = express();
var mysql      = require('mysql');
var parseString = require('xml2js');
var util = require('util');
app.use(bodyParser.json({limit: '5000000', parameterLimit : 50000}));
app.use(bodyParser.urlencoded({limit: '50mb', extended: true}));
app.use(express.static(__dirname+ '\\bower_compnents'));
app.use(morgan('dev'));                                         // log every request to the console
var parser = new parseString.Parser(); 
var server = app.listen(3001);
var fs = require('fs');
var file = 'in.json'; 
var file_out = 'out.json';
var ob = '';
var connection = mysql.createConnection({
  connectionLimit : 50,
  host     : 'localhost',
  user     : 'root',   
  password : '',
  database: 'imobile'
});  
var apartamentele = JSON.parse(fs.readFileSync('./out2.json', 'utf8')); 
connection.connect(); 
for(var k = 0; k < apartamentele.length; k++){
  connection.query('INSERT INTO apartamente SET ?',apartamentele[k], function(err, rows, fields) {
    if (err) throw err;
    for (var i in rows) { 
    }
  }); 
}   
connection.end();
 