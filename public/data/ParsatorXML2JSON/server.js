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
var server = app.listen(3000);
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
/*var apartamentele = JSON.parse(fs.readFileSync('./out2.json', 'utf8'));
// console.log(apartamentele[0].nr_camere);
connection.connect();
// var apartament = {telefon : '0756633766'};
for(var k = 0; k < apartamentele.length; k++){
  connection.query('INSERT INTO apartamente SET ?',apartamentele[k], function(err, rows, fields) {
    if (err) throw err;
    for (var i in rows) {
      // console.log('Post Titles: ', rows[i].telefon);
    }
  }); 
}  */
connection.end();

fs.readFile(__dirname + '/020720151331.xml', function(err, data) {
    parser.parseString(data);
});
parser.addListener('end', function(result) {
    ob = result 
    console.log('Dones.');
});
app.get('/data', function (req, res) {
  res.json(ob);
});

app.post('/data', function (req, res) { 
  var apartamente = req.body.data;
  // console.log(apartamente.LOCALITATE);
  // apartamente = util.inspect(apartamente, false, null); //le am in json
  fs.appendFile('out.json', util.inspect(apartamente, false, null), function (err) {
      if(err) {
          return console.log(err);
      }
      console.log("The file was saved!");
  });  
  // console.log(apartamente);
  console.log('request');
  res.end('done');

});


app.get('/', function (req, res) {
  console.log('click');
  res.sendFile(__dirname+"/index.html");
}); 

