# TYPO3 extension: replacecontent
Search and replace strings after page generation using regular expressions

Clone it
```bash
git clone https://github.com/MaxServ/t3ext-replacecontent.git replacecontent
```

Or install it using composer:
```json
{
    "repositories": [
        {
            "type": "git",
            "url": "https://github.com/MaxServ/t3ext-replacecontent.git"
        }
    ],
    "require": {
        "maxserv/replacecontent": "*"
    }
}
```

##Example
You must set the Search and Replace patterns via TypoScript.
TypoScript setup usage:
```bash
config.tx_replacecontent {
  search {
    1 = #(src|href)=("|')(/?)(typo3temp|fileadmin|uploads)/#
    2 = lala
  }
  replace {
    1 = $1=$2{$config.tx_replacecontent.schema}{$config.tx_replacecontent.host}/$4/
    2 = Smörgåsbord
  }
}```
