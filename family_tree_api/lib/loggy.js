var moment = require('moment');

var loggy = function(options){
	this.className = options.name || "loggy";
	this.dateformat = options.dateformat || "MM-DD-YYYY HH:mm:ss";
}

loggy.prototype = {
	info : function(api, message){
		console.log("["+moment().format(this.dateformat)+"]",this.className+"."+api,"[INFO]",message);
	},
	debug : function(api, message){
		console.log("["+moment().format(this.dateformat)+"]",this.className+"."+api,"[DEBUG]",message);
	},
	warn : function(api, message){
		console.log("["+moment().format("MM-DD-YYYY HH:mm:ss")+"]",this.className+"."+api,"[WARNING]",message);
	},
	error : function(api, message){
		console.log("["+moment().format("MM-DD-YYYY HH:mm:ss")+"]",this.className+"."+api,"[ERROR]",message);
	}
};

module.exports = loggy;