colophoneticphp
===============

[![Build Status](https://travis-ci.org/tobytes/colophoneticphp.svg?branch=master)](https://travis-ci.org/tobytes/colophoneticphp)
[![Coverage Status](https://coveralls.io/repos/tobytes/colophoneticphp/badge.svg?branch=master&service=github)](https://coveralls.io/github/tobytes/colophoneticphp?branch=master)

A class for retrieving the cologne phonetic (Kölner Phonetik) value of a string.

As described at [http://de.wikipedia.org/wiki/Kölner_Phonetik](http://de.wikipedia.org/wiki/Kölner_Phonetik)  
Based on Hans Joachim Postel: Die Kölner Phonetik.
Ein Verfahren zur Identifizierung von Personennamen auf der
Grundlage der Gestaltanalyse.
in: IBM-Nachrichten, 19. Jahrgang, 1969, S. 925-931

This class is based on the cologne_phon function by Nikolas Zimmer (nicolas dot zimmer at einfachmarke.de) provided by him
in a [comment](http://de2.php.net/manual/en/function.soundex.php#84881) on php.net.

I modified the function to fix some errors and wrapped a class around it.

## Installation

Installation of this module uses composer. For composer documentation, please refer to
[getcomposer.org](http://getcomposer.org/).

Put the following into your composer.json

    {
        "require": {
            "tobytes/colophoneticphp": "~1.0"
        }
    }

