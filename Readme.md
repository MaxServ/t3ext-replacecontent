# TYPO3 extension: replacecontent

[![Build Status](https://travis-ci.org/MaxServ/t3ext-replacecontent.svg?branch=master)](https://travis-ci.org/MaxServ/t3ext-replacecontent)

**Search and replace strings after page generation using regular expressions**

## Installation

Install it using Composer:

```bash
composer config repositories.replacecontent vcs https://github.com/MaxServ/t3ext-replacecontent.git
composer require maxserv/replacecontent

```

Or clone it

```bash
git clone https://github.com/MaxServ/t3ext-replacecontent.git replacecontent
```

More information on [usage] and [administration] can be found in the [documentation folder].

## Example

You must set the Search and Replace patterns via TypoScript.

TypoScript setup usage:

```
config.tx_replacecontent {
  search {
    1 = #(src|href)=("|')(/?)(typo3temp|fileadmin|uploads)/#
    2 = /lala/
  }

  replace {
    1 = $1=$2{$config.tx_replacecontent.schema}{$config.tx_replacecontent.host}/$4/
    2 = Smörgåsbord
  }
}
```

## License & Disclaimer

Copyright 2016 Michiel Roos - MaxServ B.V.

This Source Code Form is subject to the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version. If a copy of the GPL was not distributed with this file, You can obtain one at http://www.gnu.org/copyleft/gpl.html

BECAUSE THE PROGRAM IS LICENSED FREE OF CHARGE, THERE IS NO WARRANTY FOR THE PROGRAM, TO THE EXTENT PERMITTED BY APPLICABLE LAW. EXCEPT WHEN OTHERWISE STATED IN WRITING THE COPYRIGHT HOLDERS AND/OR OTHER PARTIES PROVIDE THE PROGRAM "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.

IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW OR AGREED TO IN WRITING WILL ANY COPYRIGHT HOLDER, OR ANY OTHER PARTY WHO MAY MODIFY AND/OR REDISTRIBUTE THE PROGRAM AS PERMITTED ABOVE, BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS), EVEN IF SUCH HOLDER OR OTHER PARTY HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.

[administration]: Documentation/Administration/Index.rst "Administration"
[documentation folder]: Documentation/Index.rst "Documentation folder"
[usage]: Documentation/Introduction/Index.rst "Usage"
