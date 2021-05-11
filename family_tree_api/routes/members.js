var logger = require('../lib/loggy')
, help = require('../lib/helperutil')
, ft = require('../lib/databaseFT')
, async = require('async');

var finishRequest = help.retres;

var Members = function (options) {
    dbs = new ft({
        host: options.db.hostname,
        port: options.db.port,
        user: options.db.username,
        password: options.db.password,
        database: options.db.database
    });

    familyTreeLog = new logger({ 
        name: 'familytree'
    });

    verbose = options.verbose;
}

Members.prototype = {
    addMember: async function (request, response) {
        var start_time = Date.now()
        
        var post_param = request.body
        var fullname = post_param.fullname
        var gender = post_param.gender
        var age = post_param.age

        var api = "addMember"

        familyTreeLog.info(api, "-- STARTED --")

        var promise = new Promise((resolve, reject) => {
            dbs.addMember(fullname, gender, age, function (error, results) {
                if (error) {
                    familyTreeLog.error(api, "Error " + error)
                    reject(error)
                } else {
                    familyTreeLog.info("Posted data: ", post_param)
                    resolve("Member successfully saved.")
                }
            });
        }).catch(err => {
            familyTreeLog.error(api, "Error " + err);
            finishRequest(start_time, 0, "FAILED", err, response);
            familyTreeLog.error(api, "-- ENDED --");
        })

        var final_result = await promise
 
        finishRequest(start_time, 1, 'SUCCESS', final_result, response);
        familyTreeLog.info(api, "-- ENDED SUCCESS --"); 
    },
    getAllMember: async function (request, response) {
        var start_time = Date.now()

        var get_param = request.body
        var api = "getAllMember"

        familyTreeLog.info(api, "-- STARTED --")

        var promise = new Promise((resolve, reject) => {
            dbs.getMembers(function (error, results) {
                if (error) {
                    reject(error)
                } else {
                    if(results == 0){
                        familyTreeLog.info(api, results);
                        resolve("No records found.")
                    } else {
                        resolve(results[0])
                    }
                }
            });
        }).catch(err => {
            familyTreeLog.error(api, "Error " + err);
            finishRequest(start_time, 0, "FAILED", err, response);
        })
        
        var final_result = await promise
         
        finishRequest(start_time, 1, 'SUCCESS', final_result, response);
        familyTreeLog.info(api, "-- ENDED SUCCESS --");  
    },
    getMember: async function (request, response) {
        var start_time = Date.now()

        var get_param = request.body
        var memberID = get_param.memberID
        var api = "getMember"

        familyTreeLog.info(api, "-- STARTED --")

        var promise = new Promise((resolve, reject) => {
            dbs.getMemberByID(memberID, function (error, results) {
                if (error) {
                    reject(error)
                } else {
                    if(results == 0){
                        familyTreeLog.info(api, results);
                        resolve("No records found.")
                    } else {
                        resolve(results[0][0])
                    }
                }
            });
        }).catch(err => {
            familyTreeLog.error(api, "Error " + err);
            finishRequest(start_time, 0, "FAILED", err, response);
        })
        
        var final_result = await promise
         
        finishRequest(start_time, 1, 'SUCCESS', final_result, response);
        familyTreeLog.info(api, "-- ENDED SUCCESS --");  
    },
    deleteMember: async function (request, response) {
        var start_time = Date.now()

        var get_param = request.body
        var memberID = get_param.memberID
        var api = "deleteMember"

        familyTreeLog.info(api, "-- STARTED --")

        var promise = new Promise((resolve, reject) => {
            dbs.deleteMemberByID(memberID, function (error, results) {
                if (error) {
                    reject(error)
                } else {
                    if(results == 0){
                        familyTreeLog.info(api, results);
                        resolve("No records found.")
                    } else {
                        resolve("Member sucessfully deleted.")
                    }
                }
            });
        }).catch(err => {
            familyTreeLog.error(api, "Error " + err);
            finishRequest(start_time, 0, "FAILED", err, response);
        })
        
        var final_result = await promise
         
        finishRequest(start_time, 1, 'SUCCESS', final_result, response);
        familyTreeLog.info(api, "-- ENDED SUCCESS --");  
    },
    updateMember: async function (request, response) {
        var start_time = Date.now()
        
        var post_param = request.body
        var memberID = post_param.memberID
        var fullname = post_param.fullname
        var gender = post_param.gender
        var age = post_param.age

        var api = "updateMember"

        familyTreeLog.info(api, "-- STARTED --")

        var promise = new Promise((resolve, reject) => {
            dbs.updateMember(memberID, fullname, gender, age, function (error, results) {
                if (error) {
                    familyTreeLog.error(api, "Error " + error)
                    reject(error)
                } else {
                    familyTreeLog.info("Posted data: ", post_param)
                    resolve("Member successfully updated.")
                }
            });
        }).catch(err => {
            familyTreeLog.error(api, "Error " + err);
            finishRequest(start_time, 0, "FAILED", err, response);
            familyTreeLog.error(api, "-- ENDED --");
        })

        var final_result = await promise
 
        finishRequest(start_time, 1, 'SUCCESS', final_result, response);
        familyTreeLog.info(api, "-- ENDED SUCCESS --"); 
    }
}

module.exports = Members;