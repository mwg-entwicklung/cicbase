<?php
namespace CIC\Cicbase\Migration;

abstract class AbstractMigration implements MigrationInterface {

	/** @var \TYPO3\CMS\Core\Database\DatabaseConnection */
	protected $db;

	/** @var string */
	protected $errorMsg = '';

	public function __construct() {
		$this->db = $GLOBALS['TYPO3_DB'];
	}

	abstract public function run();

	/**
	 * @return bool
	 */
	public function canRollback() {
		return method_exists($this, 'rollback');
	}


	/**
	 * Copies the data from one table to another.
	 * If the source table has more columns than the destination table,
	 * the copy still happens just without that data being transferred.
	 *
	 * @param string $source
	 * @param string $destination
	 * @param array $renameColumns [sourceColName => destColName, ...] Needed if you're copying from one table to another where the column names differ
	 * @return boolean
	 */
	protected function copyTable($source, $destination, $renameColumns = []) {
		$this->expectTables([$source, $destination], "Can't copy table");
		$sourceCols = $this->fields($source);
		$destCols = $this->fields($destination);
		if (count($renameColumns)) {
			$selects = [];
			$newSourceCols = [];
			foreach ($sourceCols as $sourceCol) {
				if (isset($renameColumns[$sourceCol])) {
					$selects[] = "$sourceCol AS {$renameColumns[$sourceCol]}";
					$newSourceCols[] = $renameColumns[$sourceCol];
				} else {
					$selects[] = $sourceCol;
				}
			}
			$this->expectColumns($destination, $newSourceCols, "Can't copy table after renaming columns.");
			$select = implode(', ', $selects);
		} else {
			$select = '*';
		}

		$rows = $this->db->exec_SELECTgetRows($select, $source, '');

		if (count($sourceCols) > count($destCols)) {
			$extraFields = array_diff($sourceCols, $destCols);
			$extraFieldsString = '['.implode(',', $extraFields).']';
			$this->log("Copying table with mismatching fields. $source -> $destination. Extra fields in source: $extraFieldsString.");
			$newRows = [];
			foreach ($rows as $row) {
				$newRows[] = array_intersect_key($row, array_flip((array) $destCols));
			}
			$rows = $newRows;
		}
		$this->db->exec_INSERTmultipleRows($destination, array_keys($rows[0]), $rows);
		$this->success("Copied table from $source to $destination.");
		return TRUE;
	}

	/**
	 * Copies a column into another column on the same or different table.
	 * Fails if the columns don't exist in either table.
	 *
	 * @param string $table
	 * @param string $sourceField
	 * @param string $destinationField
	 * @throws \Exception
	 */
	protected function copyField($table, $sourceField, $destinationField) {
		$this->expectColumns($table, [$sourceField, $destinationField], "Can't copy $sourceField to $destinationField in $table");
		$this->db->exec_UPDATEquery($table, '', [$destinationField => $sourceField], [$destinationField]);
		$this->success("Copied field in table $table from $sourceField to $destinationField");
		return;
	}

	/**
	 * @param string $table
	 * @param string $message
	 * @throws \Exception
	 */
	protected function expectTable($table, $message) {
		if (!$this->tableExists($table)) {
			$this->errorMsg = $message . "\n  Table doesn't exist: $table.";
			throw new \Exception();
		}
	}

	/**
	 * @param array $tables
	 * @param string $message
	 * @throws \Exception
	 */
	protected function expectTables(array $tables, $message) {
		if (!$this->tablesExist($tables, $message)) {
			$this->errorMsg = $message . "\n  At least one of these tables doesn't exist: ".implode(', ', $tables).'.';
			throw new \Exception();
		}
	}

	/**
	 * @param string $table
	 * @param string $column
	 * @param string $message
	 * @throws \Exception
	 */
	protected function expectColumn($table, $column, $message) {
		if (!$this->columnExists($table, $column)) {
			$this->errorMsg = $message . "\n  Column $column does not exist in table $table.";
			throw new \Exception();
		}
	}

	/**
	 * @param string $table
	 * @param array $columns
	 * @param string $message
	 * @throws \Exception
	 */
	protected function expectColumns($table, array $columns, $message) {
		if (!$this->columnsExist($table, $columns)) {
			$this->errorMsg = $message . "\n  Table $table is missing at least one of these columns: ".implode(', ', $columns).'.';
			throw new \Exception();
		}
	}


	/**
	 * @param string $table
	 * @param string $column
	 * @return bool
	 */
	protected function columnExists($table, $column) {
		return $this->tableExists($table) && array_search($column, $this->fields($table)) !== FALSE;
	}

	/**
	 * @param string $table
	 * @param array $columns
	 * @return bool
	 */
	protected function columnsExist($table, array $columns) {
		$uColumns = array_unique($columns);
		$uColumnCount = count($uColumns);
		return $uColumnCount > 0 && $this->tableExists($table) && count(array_intersect($this->fields($table), $uColumns)) == $uColumnCount;
	}

	/**
	 * @param string $table
	 * @return bool
	 */
	protected function tableExists($table) {
		return in_array($table, $this->tables());
	}

	/**
	 * @param array $tables
	 * @return bool
	 */
	protected function tablesExist(array $tables) {
		$uTables = array_unique($tables);
		$uTableCount = count($uTables);
		return $uTableCount > 0 && count(array_intersect($this->tables(), $uTables)) == $uTableCount;
	}

	/**
	 * @param string $table
	 * @return array
	 */
	protected function fields($table) {
		return array_keys($this->db->admin_get_fields($table));
	}

	/**
	 * @return array
	 */
	protected function tables() {
		if (!isset($this->_tables)) {
			$this->_tables = array_keys($this->db->admin_get_tables());
		}
		return $this->_tables;
	}


	/**
	 * @param string $msg
	 */
	protected function log($msg) {
		echo "  LOG: $msg\n";
	}

	protected function success($msg) {
		echo "  SUCCESS: $msg\n";
	}

	/**
	 * @return string
	 */
	public function getErrorMsg() {
		return $this->errorMsg;
	}

}

?>