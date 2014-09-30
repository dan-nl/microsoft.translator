(function() {

	var
	result,
	options = {
		appId: response_json.access_token
	};

	if ( response_json.error ) {
		$('body')
			.append(
				$('<p>')
					.addClass( 'error' )
					.text( response_json.error + '. ' + response_json.error_description )
			);
		return;
	}

	options.callback = function( response ) { console.log( response ); };
	microsoft.translator.getLanguagesForTranslate( options );

	options.callback = function( response ) { console.log( response ); };
	microsoft.translator.getLanguagesForSpeak( options );

	options.locale = 'nl';
	options.callback = function( response ) { console.log( response ); };
	microsoft.translator.getLanguageNames( options );

	options.to = 'nl';
	options.text = 'The quick brown fox jumped over the lazy old dog.';
	options.callback = function( response ) { console.log( response ); };
	microsoft.translator.translate( options );

	options.language = 'en';
	options.text = 'Four score and seven years ago our fathers brought forth on this continent a new nation, conceived in liberty, and dedicated to the proposition that all men are created equal.';
	options.options = 'MinSize';
	options.format = 'audio/mp3';
	options.callback = function( response ) {
		$('body')
			.append(
				$('<a>')
					.attr( 'href', response )
					.attr( 'target', '_blank' )
					.text( 'sound file' )
			);
	}
	microsoft.translator.speak( options );


}());