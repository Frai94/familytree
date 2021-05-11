var siteConfig;
try {
	// Usually we check for siteConfig.js in project root.
	siteConfig = require('../config.js');
} catch(e) {
	try {
		// Looks for Config in home dir, used for no.de
		siteConfig = require(process.env.HOME+'/config.js');
	} catch(e) {
		throw new Error('Could not load site config.')
	}
}

module.exports = siteConfig;