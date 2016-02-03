.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../../Includes.txt



.. _configuration:

=============
Configuration
=============

The extension can be configured using TypoScript. You define an array of search regexes and a matching array of
replaces. Each pattern will be replaced by the replacement counterpart. If there are fewer elements in the replacement
array than in the pattern array, any extra patterns will be replaced by an empty string.

The preg_replace rules apply: `http://www.php.net/preg_replace <http://www.php.net/preg_replace>`_.

Here is an example that prefixes all links to files in typo3temp, fileadmin and uploads with `http://your.domain.tld/
<http://your.domain.tld/>`_. This configuration can be used to set up a cookie free domain.

You may have other uses. You are totally free to do anything regular expressions allow you to do.


.. _constants:

Constants
=========

.. code-block:: typoscript

   config.tx_replacecontent {
      host = your.domain.tld
      schema = http://
   }


.. _setup:

Setup
=====

.. code-block:: typoscript

   config.tx_replacecontent {
      search {
         1 = #(src|href)=("|')(/?)([^/]*/)?(typo3temp|fileadmin|uploads)/#
      }
      replace {
         1 = $1=$2{$config.tx_replacecontent.schema}{$config.tx_replacecontent.host}/$4$5/
      }
   }

