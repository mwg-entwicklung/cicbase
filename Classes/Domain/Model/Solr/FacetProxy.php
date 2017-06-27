<?php namespace CIC\Cicbase\Domain\Model\Solr;

use CIC\Cicbase\Traits\ExtbaseInstantiable;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class Facet
 * @package CIC\Cicbase\Domain\Model
 */
class FacetProxy {
    use ExtbaseInstantiable;

    /**
     * @var \Tx_Solr_Facet_Facet
     */
    protected $txSolrFacet;

    /**
     * @var array
     */
    protected $options = [];

    /**
     * FacetProxy constructor.
     * @param \Tx_Solr_Facet_Facet $txSolrFacet
     */
    public function __construct(\Tx_Solr_Facet_Facet $txSolrFacet) {
        $this->txSolrFacet = $txSolrFacet;
    }

    /**
     * @return array
     */
    public function getOptions() {
        /**
         * Already fetched these
         */
        if (count($this->options)) {
            return $this->options;
        }

        $optionClass = $this->optionClass();
        return $this->options = $optionClass::fromRawOptions(
            static::_getSearch()->getFacetFieldOptions($this->getField()),
            $this
        );
    }

    /**
     * @return mixed
     */
    protected function optionClass() {
        $conf = $this->getConfiguration();
        return $conf['optionClass'] ?: FacetOption::class;
    }

    /**
     * @return string
     */
    public function getField() {
        return $this->txSolrFacet->getField();
    }

    /**
     * @param string $val
     * @return string
     */
    public function getUriParameter($val = '') {
        return "{$this->getName()}:$val";
    }

    /**
     * @return string
     */
    public function getLabel() {
        $conf = $this->getConfiguration();
        return $conf['label'];
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->txSolrFacet->getName();
    }

    /**
     * @return array
     */
    protected function getConfiguration() {
        return $this->txSolrFacet->getConfiguration();
    }

    /**
     * @return object
     */
    protected static function _getSearch() {
        return GeneralUtility::makeInstance(\Tx_Solr_Search::class);
    }

}