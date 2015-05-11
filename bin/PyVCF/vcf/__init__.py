#!/usr/bin/env python
'''A VCFv4.0 and 4.1 parser for Python.

Online version of PyVCF documentation is available at http://pyvcf.rtfd.org/

The intent of this module is to mimic the ``csv`` module in the Python stdlib,
as opposed to more flexible serialization formats like JSON or YAML.  ``vcf``
will attempt to parse the content of each record based on the data types
specified in the meta-information lines --  specifically the ##INFO and
##FORMAT lines.  If these lines are missing or incomplete, it will check
against the reserved types mentioned in the spec.  Failing that, it will just
return strings.

There main interface is the class: ``Reader``.  It takes a file-like
object and acts as a reader::

    >>> import vcf
    >>> vcf_reader = vcf.Reader(open('vcf/test/example-4.0.vcf', 'r'))
    >>> for record in vcf_reader:
    ...     print record
    Record(CHROM=20, POS=14370, REF=G, ALT=[A])
    Record(CHROM=20, POS=17330, REF=T, ALT=[A])
    Record(CHROM=20, POS=1110696, REF=A, ALT=[G, T])
    Record(CHROM=20, POS=1230237, REF=T, ALT=[None])
    Record(CHROM=20, POS=1234567, REF=GTCT, ALT=[G, GTACT])


This produces a great deal of information, but it is conveniently accessed.
The attributes of a Record are the 8 fixed fields from the VCF spec::

    * ``Record.CHROM``
    * ``Record.POS``
    * ``Record.ID``
    * ``Record.REF``
    * ``Record.ALT``
    * ``Record.QUAL``
    * ``Record.FILTER``
    * ``Record.INFO``

plus attributes to handle genotype information:

    * ``Record.FORMAT``
    * ``Record.samples``
    * ``Record.genotype``

``samples`` and ``genotype``, not being the title of any column, are left lowercase.  The format
of the fixed fields is from the spec.  Comma-separated lists in the VCF are
converted to lists.  In particular, one-entry VCF lists are converted to
one-entry Python lists (see, e.g., ``Record.ALT``).  Semicolon-delimited lists
of key=value pairs are converted to Python dictionaries, with flags being given
a ``True`` value. Integers and floats are handled exactly as you'd expect::

    >>> vcf_reader = vcf.Reader(open('vcf/test/example-4.0.vcf', 'r'))
    >>> record = vcf_reader.next()
    >>> print record.POS
    14370
    >>> print record.ALT
    [A]
    >>> print record.INFO['AF']
    [0.5]

There are a number of convenience methods and properties for each ``Record`` allowing you to
examine properties of interest::

    >>> print record.num_called, record.call_rate, record.num_unknown
    3 1.0 0
    >>> print record.num_hom_ref, record.num_het, record.num_hom_alt
    1 1 1
    >>> print record.nucl_diversity, record.aaf, record.heterozygosity
    0.6 [0.5] 0.5
    >>> print record.get_hets()
    [Call(sample=NA00002, CallData(GT=1|0, GQ=48, DP=8, HQ=[51, 51]))]
    >>> print record.is_snp, record.is_indel, record.is_transition, record.is_deletion
    True False True False
    >>> print record.var_type, record.var_subtype
    snp ts
    >>> print record.is_monomorphic
    False

``record.FORMAT`` will be a string specifying the format of the genotype
fields.  In case the FORMAT column does not exist, ``record.FORMAT`` is
``None``.  Finally, ``record.samples`` is a list of dictionaries containing the
parsed sample column and ``record.genotype`` is a way of looking up genotypes
by sample name::

    >>> record = vcf_reader.next()
    >>> for sample in record.samples:
    ...     print sample['GT']
    0|0
    0|1
    0/0
    >>> print record.genotype('NA00001')['GT']
    0|0

The genotypes are represented by ``Call`` objects, which have three attributes: the
corresponding Record ``site``, the sample name in ``sample`` and a dictionary of
call data in ``data``::

     >>> call = record.genotype('NA00001')
     >>> print call.site
     Record(CHROM=20, POS=17330, REF=T, ALT=[A])
     >>> print call.sample
     NA00001
     >>> print call.data
     CallData(GT=0|0, GQ=49, DP=3, HQ=[58, 50])

Please note that as of release 0.4.0, attributes known to have single values (such as
``DP`` and ``GQ`` above) are returned as values.  Other attributes are returned
as lists (such as ``HQ`` above).

There are also a number of methods::

    >>> print call.called, call.gt_type, call.gt_bases, call.phased
    True 0 T|T True

Metadata regarding the VCF file itself can be investigated through the
following attributes:

    * ``Reader.metadata``
    * ``Reader.infos``
    * ``Reader.filters``
    * ``Reader.formats``
    * ``Reader.samples``

For example::

    >>> vcf_reader.metadata['fileDate']
    '20090805'
    >>> vcf_reader.samples
    ['NA00001', 'NA00002', 'NA00003']
    >>> vcf_reader.filters
    OrderedDict([('q10', Filter(id='q10', desc='Quality below 10')), ('s50', Filter(id='s50', desc='Less than 50% of samples have data'))])
    >>> vcf_reader.infos['AA'].desc
    'Ancestral Allele'

ALT records are actually classes, so that you can interrogate them::

    >>> reader = vcf.Reader(open('vcf/test/example-4.1-bnd.vcf'))
    >>> _ = reader.next(); row = reader.next()
    >>> print row
    Record(CHROM=1, POS=2, REF=T, ALT=[T[2:3[])
    >>> bnd = row.ALT[0]
    >>> print bnd.withinMainAssembly, bnd.orientation, bnd.remoteOrientation, bnd.connectingSequence
    True False True T

The Reader supports retrieval of records within designated regions for
files with tabix indexes via the fetch method. Pass in a chromosome,
and, optionally, start and end coordinates, for the regions of
interest::

    >>> vcf_reader = vcf.Reader(filename='vcf/test/tb.vcf.gz')
    >>> # fetch all records on chromosome 20 from base 1110696 through 1230237
    >>> for record in vcf_reader.fetch('20', 1110695, 1230237):  # doctest: +SKIP
    ...     print record
    Record(CHROM=20, POS=1110696, REF=A, ALT=[G, T])
    Record(CHROM=20, POS=1230237, REF=T, ALT=[None])

Note that the start and end coordinates are in the zero-based, half-open
coordinate system, similar to ``_Record.start`` and ``_Record.end``. The
very first base of a chromosome is index 0, and the the region includes
bases up to, but not including the base at the end coordinate. For
example::

    >>> # fetch all records on chromosome 4 from base 11 through 20
    >>> vcf_reader.fetch('4', 10, 20)   # doctest: +SKIP

would include all records overlapping a 10 base pair region from the
11th base of through the 20th base (which is at index 19) of chromosome
4. It would not include the 21st base (at index 20). (See
http://genomewiki.ucsc.edu/index.php/Coordinate_Transforms for more
information on the zero-based, half-open coordinate system.)

The ``Writer`` class provides a way of writing a VCF file.  Currently, you must specify a
template ``Reader`` which provides the metadata::

    >>> vcf_reader = vcf.Reader(filename='vcf/test/tb.vcf.gz')
    >>> vcf_writer = vcf.Writer(open('/dev/null', 'w'), vcf_reader)
    >>> for record in vcf_reader:
    ...     vcf_writer.write_record(record)


An extensible script is available to filter vcf files in vcf_filter.py.  VCF filters
declared by other packages will be available for use in this script.  Please
see :doc:`FILTERS` for full description.

'''
from vcf.parser import Reader, Writer
from vcf.parser import VCFReader, VCFWriter
from vcf.filters import Base as Filter
from vcf.parser import RESERVED_INFO, RESERVED_FORMAT
from vcf.sample_filter import SampleFilter

VERSION = '0.6.7'
