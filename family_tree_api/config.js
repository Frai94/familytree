var settings = {
	'port': 8000,
	'env': 'development',
	'verbose': true,
	'development': {
		"db": {
			"hostname": '127.0.0.1',
			"username": 'root',
			"password": '',
			"database": 'familytree',
			"port": 3306,
			"supportBigNumbers": true,
			"bigNumberStrings": true
		}
	}
}

module.exports = settings;