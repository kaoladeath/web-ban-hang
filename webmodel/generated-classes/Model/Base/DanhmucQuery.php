<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Danhmuc as ChildDanhmuc;
use Model\DanhmucQuery as ChildDanhmucQuery;
use Model\Map\DanhmucTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'DanhMuc' table.
 *
 *
 *
 * @method     ChildDanhmucQuery orderByMadm($order = Criteria::ASC) Order by the MaDM column
 * @method     ChildDanhmucQuery orderByTendm($order = Criteria::ASC) Order by the TenDM column
 *
 * @method     ChildDanhmucQuery groupByMadm() Group by the MaDM column
 * @method     ChildDanhmucQuery groupByTendm() Group by the TenDM column
 *
 * @method     ChildDanhmucQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDanhmucQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDanhmucQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDanhmucQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDanhmucQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDanhmucQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDanhmucQuery leftJoinLoaisp($relationAlias = null) Adds a LEFT JOIN clause to the query using the Loaisp relation
 * @method     ChildDanhmucQuery rightJoinLoaisp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Loaisp relation
 * @method     ChildDanhmucQuery innerJoinLoaisp($relationAlias = null) Adds a INNER JOIN clause to the query using the Loaisp relation
 *
 * @method     ChildDanhmucQuery joinWithLoaisp($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Loaisp relation
 *
 * @method     ChildDanhmucQuery leftJoinWithLoaisp() Adds a LEFT JOIN clause and with to the query using the Loaisp relation
 * @method     ChildDanhmucQuery rightJoinWithLoaisp() Adds a RIGHT JOIN clause and with to the query using the Loaisp relation
 * @method     ChildDanhmucQuery innerJoinWithLoaisp() Adds a INNER JOIN clause and with to the query using the Loaisp relation
 *
 * @method     \Model\LoaispQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildDanhmuc findOne(ConnectionInterface $con = null) Return the first ChildDanhmuc matching the query
 * @method     ChildDanhmuc findOneOrCreate(ConnectionInterface $con = null) Return the first ChildDanhmuc matching the query, or a new ChildDanhmuc object populated from the query conditions when no match is found
 *
 * @method     ChildDanhmuc findOneByMadm(int $MaDM) Return the first ChildDanhmuc filtered by the MaDM column
 * @method     ChildDanhmuc findOneByTendm(string $TenDM) Return the first ChildDanhmuc filtered by the TenDM column *

 * @method     ChildDanhmuc requirePk($key, ConnectionInterface $con = null) Return the ChildDanhmuc by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDanhmuc requireOne(ConnectionInterface $con = null) Return the first ChildDanhmuc matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDanhmuc requireOneByMadm(int $MaDM) Return the first ChildDanhmuc filtered by the MaDM column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDanhmuc requireOneByTendm(string $TenDM) Return the first ChildDanhmuc filtered by the TenDM column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDanhmuc[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildDanhmuc objects based on current ModelCriteria
 * @method     ChildDanhmuc[]|ObjectCollection findByMadm(int $MaDM) Return ChildDanhmuc objects filtered by the MaDM column
 * @method     ChildDanhmuc[]|ObjectCollection findByTendm(string $TenDM) Return ChildDanhmuc objects filtered by the TenDM column
 * @method     ChildDanhmuc[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class DanhmucQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\DanhmucQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'quanlybanhang', $modelName = '\\Model\\Danhmuc', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildDanhmucQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildDanhmucQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildDanhmucQuery) {
            return $criteria;
        }
        $query = new ChildDanhmucQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildDanhmuc|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(DanhmucTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = DanhmucTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildDanhmuc A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT MaDM, TenDM FROM DanhMuc WHERE MaDM = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildDanhmuc $obj */
            $obj = new ChildDanhmuc();
            $obj->hydrate($row);
            DanhmucTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildDanhmuc|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildDanhmucQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DanhmucTableMap::COL_MADM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildDanhmucQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DanhmucTableMap::COL_MADM, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the MaDM column
     *
     * Example usage:
     * <code>
     * $query->filterByMadm(1234); // WHERE MaDM = 1234
     * $query->filterByMadm(array(12, 34)); // WHERE MaDM IN (12, 34)
     * $query->filterByMadm(array('min' => 12)); // WHERE MaDM > 12
     * </code>
     *
     * @param     mixed $madm The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDanhmucQuery The current query, for fluid interface
     */
    public function filterByMadm($madm = null, $comparison = null)
    {
        if (is_array($madm)) {
            $useMinMax = false;
            if (isset($madm['min'])) {
                $this->addUsingAlias(DanhmucTableMap::COL_MADM, $madm['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($madm['max'])) {
                $this->addUsingAlias(DanhmucTableMap::COL_MADM, $madm['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DanhmucTableMap::COL_MADM, $madm, $comparison);
    }

    /**
     * Filter the query on the TenDM column
     *
     * Example usage:
     * <code>
     * $query->filterByTendm('fooValue');   // WHERE TenDM = 'fooValue'
     * $query->filterByTendm('%fooValue%'); // WHERE TenDM LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tendm The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildDanhmucQuery The current query, for fluid interface
     */
    public function filterByTendm($tendm = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tendm)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tendm)) {
                $tendm = str_replace('*', '%', $tendm);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DanhmucTableMap::COL_TENDM, $tendm, $comparison);
    }

    /**
     * Filter the query by a related \Model\Loaisp object
     *
     * @param \Model\Loaisp|ObjectCollection $loaisp the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildDanhmucQuery The current query, for fluid interface
     */
    public function filterByLoaisp($loaisp, $comparison = null)
    {
        if ($loaisp instanceof \Model\Loaisp) {
            return $this
                ->addUsingAlias(DanhmucTableMap::COL_MADM, $loaisp->getDanhmucMadm(), $comparison);
        } elseif ($loaisp instanceof ObjectCollection) {
            return $this
                ->useLoaispQuery()
                ->filterByPrimaryKeys($loaisp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLoaisp() only accepts arguments of type \Model\Loaisp or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Loaisp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildDanhmucQuery The current query, for fluid interface
     */
    public function joinLoaisp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Loaisp');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Loaisp');
        }

        return $this;
    }

    /**
     * Use the Loaisp relation Loaisp object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\LoaispQuery A secondary query class using the current class as primary query
     */
    public function useLoaispQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLoaisp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Loaisp', '\Model\LoaispQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildDanhmuc $danhmuc Object to remove from the list of results
     *
     * @return $this|ChildDanhmucQuery The current query, for fluid interface
     */
    public function prune($danhmuc = null)
    {
        if ($danhmuc) {
            $this->addUsingAlias(DanhmucTableMap::COL_MADM, $danhmuc->getMadm(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the DanhMuc table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DanhmucTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            DanhmucTableMap::clearInstancePool();
            DanhmucTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(DanhmucTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(DanhmucTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            DanhmucTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            DanhmucTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // DanhmucQuery
