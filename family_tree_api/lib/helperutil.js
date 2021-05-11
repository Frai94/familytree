exports.retres = function (timestart, status, message, result, response) {
	var output;
	response.type("text/json");
	output = {
		"completed_in": Date.now() - timestart,
		"status": status,
		"message": message,
		"results": result
	};
	response.send(200, output);
};