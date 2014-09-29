(function() {

	var
	result,
	options = {
		appId: response_json.access_token,
		callback: function( response ) { console.log( response ); }
	};

	//microsoft.translator.getLanguagesForTranslate( options );
	//microsoft.translator.getLanguagesForSpeak( options );

	//options.locale = 'nl';
	//microsoft.translator.getLanguageNames( options );


	//options.to = 'nl';
	//options.text = 'The quick brown fox jumped over the lazy old dog.';
	//microsoft.translator.translate( options );

	options.language = 'es';
	options.text = 'The quick brown fox jumped over the lazy old dog.';
	microsoft.translator.speak( options );


}());