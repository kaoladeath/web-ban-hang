<?php

namespace Model\Map;

use Model\Quangcao;
use Model\QuangcaoQuery;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;


/**
 * This class defines the structure of the 'QuangCao' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class QuangcaoTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Model.Map.QuangcaoTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'quanlybanhang';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'QuangCao';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Model\\Quangcao';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Model.Quangcao';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 6;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 6;

    /**
     * the column name for the MaQuangCao field
     */
    const COL_MAQUANGCAO = 'QuangCao.MaQuangCao';

    /**
     * the column name for the NoiDung field
     */
    const COL_NOIDUNG = 'QuangCao.NoiDung';

    /**
     * the column name for the NgayDang field
     */
    const COL_NGAYDANG = 'QuangCao.NgayDang';

    /**
     * the column name for the Link field
     */
    const COL_LINK = 'QuangCao.Link';

    /**
     * the column name for the HinhAnh field
     */
    const COL_HINHANH = 'QuangCao.HinhAnh';

    /**
     * the column name for the LoaiQuangCao_MaLoaiQuangCao field
     */
    const COL_LOAIQUANGCAO_MALOAIQUANGCAO = 'QuangCao.LoaiQuangCao_MaLoaiQuangCao';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Maquangcao', 'Noidung', 'Ngaydang', 'Link', 'Hinhanh', 'LoaiquangcaoMaloaiquangcao', ),
        self::TYPE_CAMELNAME     => array('maquangcao', 'noidung', 'ngaydang', 'link', 'hinhanh', 'loaiquangcaoMaloaiquangcao', ),
        self::TYPE_COLNAME       => array(QuangcaoTableMap::COL_MAQUANGCAO, QuangcaoTableMap::COL_NOIDUNG, QuangcaoTableMap::COL_NGAYDANG, QuangcaoTableMap::COL_LINK, QuangcaoTableMap::COL_HINHANH, QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, ),
        self::TYPE_FIELDNAME     => array('MaQuangCao', 'NoiDung', 'NgayDang', 'Link', 'HinhAnh', 'LoaiQuangCao_MaLoaiQuangCao', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Maquangcao' => 0, 'Noidung' => 1, 'Ngaydang' => 2, 'Link' => 3, 'Hinhanh' => 4, 'LoaiquangcaoMaloaiquangcao' => 5, ),
        self::TYPE_CAMELNAME     => array('maquangcao' => 0, 'noidung' => 1, 'ngaydang' => 2, 'link' => 3, 'hinhanh' => 4, 'loaiquangcaoMaloaiquangcao' => 5, ),
        self::TYPE_COLNAME       => array(QuangcaoTableMap::COL_MAQUANGCAO => 0, QuangcaoTableMap::COL_NOIDUNG => 1, QuangcaoTableMap::COL_NGAYDANG => 2, QuangcaoTableMap::COL_LINK => 3, QuangcaoTableMap::COL_HINHANH => 4, QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO => 5, ),
        self::TYPE_FIELDNAME     => array('MaQuangCao' => 0, 'NoiDung' => 1, 'NgayDang' => 2, 'Link' => 3, 'HinhAnh' => 4, 'LoaiQuangCao_MaLoaiQuangCao' => 5, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('QuangCao');
        $this->setPhpName('Quangcao');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Model\\Quangcao');
        $this->setPackage('Model');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('MaQuangCao', 'Maquangcao', 'INTEGER', true, null, null);
        $this->addColumn('NoiDung', 'Noidung', 'LONGVARCHAR', true, null, null);
        $this->addColumn('NgayDang', 'Ngaydang', 'TIMESTAMP', true, null, null);
        $this->addColumn('Link', 'Link', 'VARCHAR', true, 30, null);
        $this->addColumn('HinhAnh', 'Hinhanh', 'VARCHAR', false, 50, null);
        $this->addForeignPrimaryKey('LoaiQuangCao_MaLoaiQuangCao', 'LoaiquangcaoMaloaiquangcao', 'INTEGER' , 'LoaiQuangCao', 'MaLoaiQuangCao', true, null, null);
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Loaiquangcao', '\\Model\\Loaiquangcao', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':LoaiQuangCao_MaLoaiQuangCao',
    1 => ':MaLoaiQuangCao',
  ),
), null, null, null, false);
    } // buildRelations()

    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database. In some cases you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by find*()
     * and findPk*() calls.
     *
     * @param \Model\Quangcao $obj A \Model\Quangcao object.
     * @param string $key             (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (null === $key) {
                $key = serialize([(null === $obj->getMaquangcao() || is_scalar($obj->getMaquangcao()) || is_callable([$obj->getMaquangcao(), '__toString']) ? (string) $obj->getMaquangcao() : $obj->getMaquangcao()), (null === $obj->getLoaiquangcaoMaloaiquangcao() || is_scalar($obj->getLoaiquangcaoMaloaiquangcao()) || is_callable([$obj->getLoaiquangcaoMaloaiquangcao(), '__toString']) ? (string) $obj->getLoaiquangcaoMaloaiquangcao() : $obj->getLoaiquangcaoMaloaiquangcao())]);
            } // if key === null
            self::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param mixed $value A \Model\Quangcao object or a primary key value.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && null !== $value) {
            if (is_object($value) && $value instanceof \Model\Quangcao) {
                $key = serialize([(null === $value->getMaquangcao() || is_scalar($value->getMaquangcao()) || is_callable([$value->getMaquangcao(), '__toString']) ? (string) $value->getMaquangcao() : $value->getMaquangcao()), (null === $value->getLoaiquangcaoMaloaiquangcao() || is_scalar($value->getLoaiquangcaoMaloaiquangcao()) || is_callable([$value->getLoaiquangcaoMaloaiquangcao(), '__toString']) ? (string) $value->getLoaiquangcaoMaloaiquangcao() : $value->getLoaiquangcaoMaloaiquangcao())]);

            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key";
                $key = serialize([(null === $value[0] || is_scalar($value[0]) || is_callable([$value[0], '__toString']) ? (string) $value[0] : $value[0]), (null === $value[1] || is_scalar($value[1]) || is_callable([$value[1], '__toString']) ? (string) $value[1] : $value[1])]);
            } elseif ($value instanceof Criteria) {
                self::$instances = [];

                return;
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or \Model\Quangcao object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value, true)));
                throw $e;
            }

            unset(self::$instances[$key]);
        }
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)] === null && $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return serialize([(null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)]), (null === $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 5 + $offset : static::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)])]);
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
            $pks = [];

        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Maquangcao', TableMap::TYPE_PHPNAME, $indexType)
        ];
        $pks[] = (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 5 + $offset
                : self::translateFieldName('LoaiquangcaoMaloaiquangcao', TableMap::TYPE_PHPNAME, $indexType)
        ];

        return $pks;
    }

    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? QuangcaoTableMap::CLASS_DEFAULT : QuangcaoTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (Quangcao object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = QuangcaoTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = QuangcaoTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + QuangcaoTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = QuangcaoTableMap::OM_CLASS;
            /** @var Quangcao $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            QuangcaoTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();

        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = QuangcaoTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = QuangcaoTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Quangcao $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                QuangcaoTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(QuangcaoTableMap::COL_MAQUANGCAO);
            $criteria->addSelectColumn(QuangcaoTableMap::COL_NOIDUNG);
            $criteria->addSelectColumn(QuangcaoTableMap::COL_NGAYDANG);
            $criteria->addSelectColumn(QuangcaoTableMap::COL_LINK);
            $criteria->addSelectColumn(QuangcaoTableMap::COL_HINHANH);
            $criteria->addSelectColumn(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO);
        } else {
            $criteria->addSelectColumn($alias . '.MaQuangCao');
            $criteria->addSelectColumn($alias . '.NoiDung');
            $criteria->addSelectColumn($alias . '.NgayDang');
            $criteria->addSelectColumn($alias . '.Link');
            $criteria->addSelectColumn($alias . '.HinhAnh');
            $criteria->addSelectColumn($alias . '.LoaiQuangCao_MaLoaiQuangCao');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(QuangcaoTableMap::DATABASE_NAME)->getTable(QuangcaoTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(QuangcaoTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(QuangcaoTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new QuangcaoTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Quangcao or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Quangcao object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuangcaoTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Model\Quangcao) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(QuangcaoTableMap::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(QuangcaoTableMap::COL_MAQUANGCAO, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $value[1]));
                $criteria->addOr($criterion);
            }
        }

        $query = QuangcaoQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            QuangcaoTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                QuangcaoTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the QuangCao table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return QuangcaoQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Quangcao or Criteria object.
     *
     * @param mixed               $criteria Criteria or Quangcao object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuangcaoTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Quangcao object
        }

        if ($criteria->containsKey(QuangcaoTableMap::COL_MAQUANGCAO) && $criteria->keyContainsValue(QuangcaoTableMap::COL_MAQUANGCAO) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.QuangcaoTableMap::COL_MAQUANGCAO.')');
        }


        // Set the correct dbName
        $query = QuangcaoQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // QuangcaoTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
QuangcaoTableMap::buildTableMap();
