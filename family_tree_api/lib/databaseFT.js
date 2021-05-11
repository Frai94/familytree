var mysql = require('mysql');

var DatabaseFT = function (options) {
    options = options || {};
    if (options) {
        this._pool = mysql.createPool(options);
    }
};

DatabaseFT.prototype = {
    /**
     * [Get all teller]
     */
    getMembers: function (callback) {
        this._pool.getConnection(function (err, connection) {
            if (err) {
                return callback(err, null);
            }

            connection.query("call familytree.getMembers();", function (error, results) {
            connection.release();
                return callback(error, results);
            });
        });
    },
    getMemberByID: function (memberID, callback) {
        this._pool.getConnection(function (err, connection) {
            if (err) {
                return callback(err, null);
            }

            connection.query("call familytree.getMemberByID(?);", [memberID], function (error, results) {
                connection.release();
                return callback(error, results);
            });
        });
    },
    addMember: function (fullname, gender, age, callback) {
        this._pool.getConnection(function (err, connection) {
            if (err) {
                return callback(err, null);
            }

            connection.query("call familytree.addMember(?,?,?);", [fullname, gender, age], function (error, results) {
                connection.release();
                return callback(error, results);
            });
        });
    },
    deleteMemberByID: function (memberID, callback) {
        this._pool.getConnection(function (err, connection) {
            if (err) {
                return callback(err, null);
            }

            connection.query("call familytree.deleteMemberByID(?);", [memberID], function (error, results) {
                connection.release();
                return callback(error, results);
            });
        });
    },
    updateMember: function (memberID, fullname, gender, age, callback) {
        this._pool.getConnection(function (err, connection) {
            if (err) {
                return callback(err, null);
            }

            connection.query("call familytree.updateMember(?,?,?,?);", [memberID, fullname, gender, age], function (error, results) {
                connection.release();
                return callback(error, results);
            });
        });
    }
};

module.exports = DatabaseFT;