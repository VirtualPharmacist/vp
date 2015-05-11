Development
===========

Please use the `PyVCF repository <https://github.com/jamescasbon/PyVCF/>`_.
Pull requests gladly accepted. 
Issues should be reported at the github issue tracker.

Running tests
-------------

Please check the tests by running them with::

    python setup.py test 

New features should have test code sent with them.

Changes
=======

0.6.7 Release
-------------

* Include missing .pyx files 

0.6.6 Release
-------------

* better walk together record ordering (Thanks @datagram, #141)

0.6.5 Release
-------------

* Better contig handling (#115, #116, #119 thanks Martijn)
* INFO lines with type character (#120, #121 thanks @AndrewUzilov, Martijn)
* Single breakends fix (#126 thanks @pkrushe)
* Speedup by losing ordering of INFO (#128 thanks Martijn)
* HOMSEQ and other missing fields in INFO (#130 thanks Martijn)
* Add aaf property, (thanks @mgymrek #131)
* Custom equality for walk_together, thanks bow #132
* Change default line encoding to '\n'
* Improved __eq__ (#134, thanks bow)


0.6.4 Release
-------------

* Handle INFO fields with multiple values, thanks
* Support writing records without GT data #88, thanks @bow
* Pickleable call data #112, thanks @superbobry
* Write files without FORMAT #95 thanks Martijn
* Strict whitespace mode, thanks Martijn, Lee Lichtenstein and Manawsi Gupta
* Add support for contigs in header, thanks @gcnh and Martijn
* Fix GATK header parsing, thanks @alimanfoo

0.6.3 Release
-------------

* cython port of #79
* correct writing of meta lines #84 

0.6.2 Release
-------------

* issues #78, #79 (thanks Sean, Brad) 

0.6.1 Release
-------------

* Add strict whitespace mode for well formed VCFs with spaces 
  in sample names (thanks Marco)
* Ignore blank lines in files (thanks Martijn)
* Tweaks for handling missing data (thanks Sean)
* bcftools tests (thanks Martijn)
* record.FILTER is always a list

0.6.0 Release
-------------

* Backwards incompatible change: _Call.data is now a 
  namedtuple (previously it was a dict)
* Optional cython version, much improved performance.  
* Improvements to writer (thanks @cmclean)
* Improvements to inheritance of classes (thanks @lennax)


0.5.0 Release
-------------

VCF 4.1 support: 
 * support missing genotype #28 (thanks @martijnvermaat)
 * parseALT for svs #42, #48 (thanks @dzerbino)
* `trim_common_suffix` method #22 (thanks @martijnvermaat)
* Multiple metadata with the same key is stored (#52)
Writer improvements
 * A/G in Number INFO fields #53 (thanks @lennax) 
 * Better output #55 (thanks @cmclean)
* Allow malformed INFO fields #49 (thanks @ilyaminkin)
* Added bayes factor error bias VCF filter
* Added docs on vcf_melt
* filters from @libor-m (SNP only, depth per sample, avg depth per sample)
* change to the filter API, use docstring for filter description

0.4.6 Release
-------------

* Performance improvements (#47) 
* Preserve order of INFO column (#46)

0.4.5 Release
-------------

* Support exponent syntax qual values (#43, #44) (thanks @martijnvermaat) 
* Preserve order of header lines (#45) 

0.4.4 Release
-------------

* Support whitespace in sample names
* SV work (thanks @arq5x)
* Python 3 support via 2to3 (thanks @marcelm)
* Improved filtering script, capable of importing local files

0.4.3 Release
-------------

* Single floats in Reader._sample_parser not being converted to float #35
* Handle String INFO values when Number=1 in header #34

0.4.2 Release
-------------

* Installation problems

0.4.1 Release
-------------

* Installation problems

0.4.0 Release
-------------

* Package structure 
* add ``vcf.utils`` module with ``walk_together`` method
* samtools tests 
* support Freebayes' non standard '.' for no call
* fix vcf_melt  
* support monomorphic sites, add ``is_monomorphic`` method, handle null QUALs
* filter support for files with monomorphic calls 
* Values declared as single are no-longer returned in lists
* several performance improvements 


0.3.0 Release
-------------

* Fix setup.py for python < 2.7
* Add ``__eq__`` to ``_Record`` and ``_Call``
* Add ``is_het`` and ``is_variant`` to ``_Call``
* Drop aggressive parse mode: we're always aggressive.
* Add tabix fetch for single calls, fix one->zero based indexing
* add prepend_chr mode for ``Reader`` to add `chr` to CHROM attributes

0.2.2 Release
-------------

Documentation release

0.2.1 Release
-------------

* Add shebang to vcf_filter.py

0.2 Release 
-----------

* Replace genotype dictionary with a ``Call`` object
* Methods on ``Record`` and ``Call`` (thanks @arq5x)
* Shortcut parse_sample when genotype is None

0.1 Release 
-----------

* Added test code
* Added Writer class
* Allow negative number in ``INFO`` and ``FORMAT`` fields (thanks @martijnvermaat)
* Prefer ``vcf.Reader`` to ``vcf.VCFReader``
* Support compressed files with guessing where filename is available on fsock
* Allow opening by filename as well as filesocket
* Support fetching rows for tabixed indexed files
* Performance improvements (see ``test/prof.py``)
* Added extensible filter script (see FILTERS.md), vcf_filter.py 

Contributions
=============

Project started by @jdoughertyii and taken over by @jamescasbon on 12th January 2011.
Contributions from @arq5x, @brentp, @martijnvermaat, @ian1roberts, @marcelm.

This project was supported by `Population Genetics <http://www.populationgenetics.com/>`_.

