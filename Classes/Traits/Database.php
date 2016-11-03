<?php namespace CIC\Cicbase\Traits;
use TYPO3\CMS\Core\Database\DatabaseConnection;

/**
 * Class Database
 * @package CIC\Cicbase\Traits
 */
trait Database {
    use FrontendInstantiating;
    /**
     * @return DatabaseConnection
     */
    protected static function db() {
        return $GLOBALS['TYPO3_DB'];
    }

    /**
     * @param $table
     */
    protected static function enableFields($table) {
        static::initializeFrontend();
        return $GLOBALS['TSFE']->sys_page->enableFields($table);
    }

    /**
     * Cobbled from DatabaseConnection
     * @param $table
     * @param $fields_values
     * @param bool $no_quote_fields
     * @return null|string
     */
    public static function UPSERTquery($table, $fields_values, $no_quote_fields = FALSE) {
        /**
         * Table and fieldnames should be "SQL-injection-safe" when supplied to this
         * function (contrary to values in the arrays which may be insecure).
         */
        if (!is_array($fields_values) || count($fields_values) === 0) {
            return null;
        }

        /**
         * Quote and escape values
         */
        $fields_values = static::db()->fullQuoteArray($fields_values, $table, $no_quote_fields, true);
        $query = 'INSERT INTO ' . $table . ' (' . implode(',', array_keys($fields_values)) . ') VALUES ' . '(' . implode(',', $fields_values) . ')';

        /**
         * Hopefully add the duplicate key clause
         */
        if ($update = static::updateClause($fields_values)) {
            $query .= ' ON DUPLICATE KEY UPDATE ' . $update;
        }

        return $query;
    }

    /**
     * @param $fieldsValues
     * @return string
     */
    protected static function updateClause($fieldsValues) {
        $out = array();
        foreach ($fieldsValues as $key => $val) {
            $out[] = "$key=$val";
        }
        return implode(',', $out);
    }
}
