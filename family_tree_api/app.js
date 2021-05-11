const express = require("express")
    , bodyParser = require('body-parser')
    , cors = require('cors')
    , cluster = require('cluster')
    , logger = require('./lib/loggy')
    , configFile = require('./lib/getConfig')
    , path = require('path')
    , http = require('http')
    , members = require('./routes/members');

global.__basedir = __dirname;

var mainlogger  = new logger({name:'Server'});

if(cluster.isMaster){
    var cpuCount = require('os').cpus().length;

    for(var i = 0; i < cpuCount; i+=1){
        cluster.fork();
    }

    cluster.on('exit', function(worker){
        mainlogger.info("main",'Worker',worker.id,'died :(');
        cluster.fork();
    });

    cluster.on('listening', function(worker, address){
        mainlogger.info("main","A worker with #"+worker.id+" is now connected to " + address.address + ":" + address.port);
    });
}else{
    var config;
    var member_routes

    function loadConfiguration(in_config){
        member_routes = new members(in_config)
    }

    const app = express();

    app.use(cors());

    app.configure('development', function(){
        app.use(express.errorHandler());
        config = configFile.development;
        config.verbose = configFile.verbose;
        loadConfiguration(config);
    });
    
    app.configure(function(){
        app.set('port', process.env.PORT || configFile.port || 3000);
        app.use(bodyParser.json());
        app.use(bodyParser.urlencoded({
            extended: true
        }));
        app.use(express.methodOverride());
        app.use(app.router);
        app.use(express.static(path.join(__dirname, 'public')));
    });


    /* Family Tree Routes */

    app.get('/getAllMember',member_routes.getAllMember);
    app.post('/getMember',member_routes.getMember);
    app.post('/addMember',member_routes.addMember);
    app.post('/deleteMember',member_routes.deleteMember);
    app.post('/updateMember',member_routes.updateMember);

    app.agent = false;

    http.createServer(app).listen(app.get('port'), function(){
        mainlogger.info("main","Server running in " + process.env.NODE_ENV + " setup. listening on port " + app.get('port'));
    });
}