microsoft.translator
====================
initial draft

* currently implements the following api calls:
  * `breakSentences()`
  * `detect()`
  * `detectArray()`
  * `getLanguageNames()`
  * `getLanguagesForSpeak()`
  * `getLanguagesForTranslate()`
  * `speak()`
  * `translate()`
  * `translateArray()`
* does not yet make a call for a new api token; for the moment it relies on the initial token response, which is good for 10 minutes.