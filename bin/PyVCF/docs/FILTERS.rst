Filtering VCF files
===================

The filter script: vcf_filter.py
--------------------------------

Filtering a VCF file based on some properties of interest is a common enough 
operation that PyVCF offers an extensible script.  ``vcf_filter.py`` does 
the work of reading input, updating the metadata and filtering the records.


Existing Filters
----------------

.. autoclass:: vcf.filters.SiteQuality

.. autoclass:: vcf.filters.VariantGenotypeQuality

.. autoclass:: vcf.filters.ErrorBiasFilter

.. autoclass:: vcf.filters.DepthPerSample

.. autoclass:: vcf.filters.AvgDepthPerSample

.. autoclass:: vcf.filters.SnpOnly




Adding a filter
---------------

You can reuse this work by providing a filter class, rather than writing your own filter.
For example, lets say I want to filter each site based on the quality of the site.
I can create a class like this::
   
    import vcf.filters
    class SiteQuality(vcf.filters.Base):
        'Filter sites by quality'

        name = 'sq'

        @classmethod
        def customize_parser(self, parser):
            parser.add_argument('--site-quality', type=int, default=30,
                    help='Filter sites below this quality')

        def __init__(self, args):
            self.threshold = args.site_quality

        def __call__(self, record):
            if record.QUAL < self.threshold:
                return record.QUAL


This class subclasses ``vcf.filters.Base`` which provides the interface for VCF filters.
The docstring  and ``name`` are metadata about the parser.  The docstring provides
the help for the script, and the first line is included in the FILTER metadata when 
applied to a file.

The ``customize_parser`` method allows you to add arguments to the script.
We use the ``__init__`` method to grab the argument of interest from the parser.
Finally, the ``__call__`` method processes each record and returns a value if the 
filter failed.  The base class uses the ``name`` and ``threshold`` to create
the filter ID in the VCF file.

To make vcf_filter.py aware of the filter, you can either use the local script option
or declare an entry point.  To use a local script, simply call vcf_filter::

    $ vcf_filter.py --local-script my_filters.py ...

To use an entry point, you need to declare a ``vcf.filters`` entry point in your ``setup``::

    setup(
        ...
        entry_points = {
            'vcf.filters': [
                'site_quality = module.path:SiteQuality',
            ]
        }
    )

Either way, when you call vcf_filter.py, you should see your filter in the list of available filters::

    usage: vcf_filter.py [-h] [--no-short-circuit] [--no-filtered] 
                  [--output OUTPUT] [--local-script LOCAL_SCRIPT]
                  input filter [filter_args] [filter [filter_args]] ...
                

    Filter a VCF file

    positional arguments:
      input                 File to process (use - for STDIN) (default: None)

    optional arguments:
      -h, --help            Show this help message and exit. (default: False)
      --no-short-circuit    Do not stop filter processing on a site if any filter
                            is triggered (default: False)
      --output OUTPUT       Filename to output [STDOUT] (default: <open file
                            '<stdout>', mode 'w' at 0x1002841e0>)
      --no-filtered         Output only sites passing the filters (default: False)
      --local-script LOCAL_SCRIPT
                            Python file in current working directory with the
                            filter classes (default: None)

    sq:
      Filter sites by quality

      --site-quality SITE_QUALITY
                            Filter sites below this quality (default: 30)

The filter base class: vcf.filters.Base
---------------------------------------

.. autoclass:: vcf.filters.Base
   :members:



Utilities
=========

.. automodule:: vcf.utils

Simultaneously iterate two or more files
----------------------------------------

.. autofunction:: vcf.utils.walk_together

Trim common suffix
--------------------
.. autofunction:: vcf.utils.trim_common_suffix


vcf_melt
--------

This script converts a VCF file from wide format (many calls per row) 
to a long format (one call per row).  This is useful if you want to grep per sample
or for really quick import into, say, a spreadsheet::

    $ vcf_melt < vcf/test/gatk.vcf 
    SAMPLE	AD	DP	GQ	GT	PL	FILTER	CHROM	POS	REF	ALT	ID	info.AC	info.AF	info.AN	info.BaseQRankSum	info.DB	info.DP	info.DS	info.Dels	info.FS	info.HRun	info.HaplotypeScore	info.InbreedingCoeff	info.MQ	info.MQ0	info.MQRankSum	info.QD	info.ReadPosRankSum
    BLANK	6,0	6	18.04	0/0	0,18,211	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    NA12878	138,107	250	99.0	0/1	1961,0,3049	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    NA12891	169,77	250	99.0	0/1	1038,0,3533	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    NA12892	249,0	250	99.0	0/0	0,600,5732	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    NA19238	248,1	250	99.0	0/0	0,627,6191	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    NA19239	250,0	250	99.0	0/0	0,615,5899	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    NA19240	250,0	250	99.0	0/0	0,579,5674	.	chr22	42522392	G	[A]	rs28371738	2	0.143	14	0.375	True	1506	True	0.0	0.0	0	123.5516		253.92	0	0.685	5.9	0.59
    BLANK	13,4	17	62.64	0/1	63,0,296	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731
    NA12878	118,127	246	99.0	0/1	2396,0,1719	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731
    NA12891	241,0	244	99.0	0/0	0,459,4476	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731
    NA12892	161,85	246	99.0	0/1	1489,0,2353	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731
    NA19238	110,132	242	99.0	0/1	2561,0,1488	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731
    NA19239	106,135	242	99.0	0/1	2613,0,1389	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731
    NA19240	116,126	243	99.0	0/1	2489,0,1537	.	chr22	42522613	G	[C]	rs1135840	6	0.429	14	16.289	True	1518	True	0.03	0.0	0	142.5716		242.46	0	2.01	9.16	-1.731

