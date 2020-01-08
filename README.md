# Translator_Class
A simple translation class to handle multi-lingual sites using Perch v3.

Code reference: [Peter Lindqvist](https://stackoverflow.com/users/204609/peter-lindqvist) via [Stack Overflow](https://stackoverflow.com/questions/1974505/php-simple-translation-approach-your-opinion)

## Getting Started
Simply copy the files to your existing Perch project without overriding folder names.

The example files do not create any Perch regions so don't worry about messing up your existing structure.

## Usage
- Initiate a `Translator` instance. For example `$t = new Translator()`
- Set language using `$t->setLang($lang);`
- By default, it looks for files with `[your_lang_here]_Global.txt`. If file is not found, the reference key is simply printed. 
- Print and look for translations using reference key `printf($t->__('Hello'))`

## Formatted Strings
- Use multiple `args` for formatted strings. For example `printf($t->__('Hello','<span class="awesome">','</span>'))`
- In the translation file, use `%s` to denote `args`. 
- For example `Hello=Hello %sWorld%s` in the `.txt` file will output `Hello <span class="awesome">World</span>`

## Multiple Files
- Multiple translation files are supported for sites with lots of content. Strings for each section can be stored in different files, which makes it easier for content editors to manage translations.
- Set different translation files using `$t->setPackage('anotherFilename')`
- The code will then look for translation files with `[your_lang_here]_anotherFilename.txt`
