colophoneticphp
===============

[![Build Status](https://travis-ci.org/tobytes/colophoneticphp.svg?branch=master)](https://travis-ci.org/tobytes/colophoneticphp)
[![Coverage Status](https://img.shields.io/coveralls/tobytes/colophoneticphp.svg)](https://coveralls.io/r/tobytes/colophoneticphp?branch=master)
[![Latest Stable Version](https://poser.pugx.org/tobytes/colophoneticphp/v/stable.svg)](https://packagist.org/packages/tobytes/colophoneticphp)
[![License](https://poser.pugx.org/tobytes/colophoneticphp/license.svg)](https://packagist.org/packages/tobytes/colophoneticphp)

A class for retrieving the cologne phonetic (Kölner Phonetik) value of a string.

As described at [http://de.wikipedia.org/wiki/Kölner_Phonetik](http://de.wikipedia.org/wiki/Kölner_Phonetik)  
Based on Hans Joachim Postel: Die Kölner Phonetik.
Ein Verfahren zur Identifizierung von Personennamen auf der
Grundlage der Gestaltanalyse.
in: IBM-Nachrichten, 19. Jahrgang, 1969, S. 925-931

This class is based on the cologne_phon function by Nikolas Zimmer (nicolas dot zimmer at einfachmarke.de) provided by him
in a [comment](http://de2.php.net/manual/en/function.soundex.php#84881) on php.net.

I modified the function to fix some errors
