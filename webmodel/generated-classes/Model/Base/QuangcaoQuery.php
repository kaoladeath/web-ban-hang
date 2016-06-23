<?php

namespace Model\Base;

use \Exception;
use \PDO;
use Model\Quangcao as ChildQuangcao;
use Model\QuangcaoQuery as ChildQuangcaoQuery;
use Model\Map\QuangcaoTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'QuangCao' table.
 *
 *
 *
 * @method     ChildQuangcaoQuery orderByMaquangcao($order = Criteria::ASC) Order by the MaQuangCao column
 * @method     ChildQuangcaoQuery orderByNoidung($order = Criteria::ASC) Order by the NoiDung column
 * @method     ChildQuangcaoQuery orderByNgaydang($order = Criteria::ASC) Order by the NgayDang column
 * @method     ChildQuangcaoQuery orderByLink($order = Criteria::ASC) Order by the Link column
 * @method     ChildQuangcaoQuery orderByHinhanh($order = Criteria::ASC) Order by the HInhAnh column
 * @method     ChildQuangcaoQuery orderByLoaiquangcaoMaloaiquangcao($order = Criteria::ASC) Order by the LoaiQuangCao_MaLoaiQuangCao column
 *
 * @method     ChildQuangcaoQuery groupByMaquangcao() Group by the MaQuangCao column
 * @method     ChildQuangcaoQuery groupByNoidung() Group by the NoiDung column
 * @method     ChildQuangcaoQuery groupByNgaydang() Group by the NgayDang column
 * @method     ChildQuangcaoQuery groupByLink() Group by the Link column
 * @method     ChildQuangcaoQuery groupByHinhanh() Group by the HInhAnh column
 * @method     ChildQuangcaoQuery groupByLoaiquangcaoMaloaiquangcao() Group by the LoaiQuangCao_MaLoaiQuangCao column
 *
 * @method     ChildQuangcaoQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildQuangcaoQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildQuangcaoQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildQuangcaoQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildQuangcaoQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildQuangcaoQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildQuangcaoQuery leftJoinLoaiquangcao($relationAlias = null) Adds a LEFT JOIN clause to the query using the Loaiquangcao relation
 * @method     ChildQuangcaoQuery rightJoinLoaiquangcao($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Loaiquangcao relation
 * @method     ChildQuangcaoQuery innerJoinLoaiquangcao($relationAlias = null) Adds a INNER JOIN clause to the query using the Loaiquangcao relation
 *
 * @method     ChildQuangcaoQuery joinWithLoaiquangcao($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Loaiquangcao relation
 *
 * @method     ChildQuangcaoQuery leftJoinWithLoaiquangcao() Adds a LEFT JOIN clause and with to the query using the Loaiquangcao relation
 * @method     ChildQuangcaoQuery rightJoinWithLoaiquangcao() Adds a RIGHT JOIN clause and with to the query using the Loaiquangcao relation
 * @method     ChildQuangcaoQuery innerJoinWithLoaiquangcao() Adds a INNER JOIN clause and with to the query using the Loaiquangcao relation
 *
 * @method     \Model\LoaiquangcaoQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildQuangcao findOne(ConnectionInterface $con = null) Return the first ChildQuangcao matching the query
 * @method     ChildQuangcao findOneOrCreate(ConnectionInterface $con = null) Return the first ChildQuangcao matching the query, or a new ChildQuangcao object populated from the query conditions when no match is found
 *
 * @method     ChildQuangcao findOneByMaquangcao(int $MaQuangCao) Return the first ChildQuangcao filtered by the MaQuangCao column
 * @method     ChildQuangcao findOneByNoidung(string $NoiDung) Return the first ChildQuangcao filtered by the NoiDung column
 * @method     ChildQuangcao findOneByNgaydang(string $NgayDang) Return the first ChildQuangcao filtered by the NgayDang column
 * @method     ChildQuangcao findOneByLink(string $Link) Return the first ChildQuangcao filtered by the Link column
 * @method     ChildQuangcao findOneByHinhanh(string $HInhAnh) Return the first ChildQuangcao filtered by the HInhAnh column
 * @method     ChildQuangcao findOneByLoaiquangcaoMaloaiquangcao(int $LoaiQuangCao_MaLoaiQuangCao) Return the first ChildQuangcao filtered by the LoaiQuangCao_MaLoaiQuangCao column *

 * @method     ChildQuangcao requirePk($key, ConnectionInterface $con = null) Return the ChildQuangcao by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuangcao requireOne(ConnectionInterface $con = null) Return the first ChildQuangcao matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuangcao requireOneByMaquangcao(int $MaQuangCao) Return the first ChildQuangcao filtered by the MaQuangCao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuangcao requireOneByNoidung(string $NoiDung) Return the first ChildQuangcao filtered by the NoiDung column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuangcao requireOneByNgaydang(string $NgayDang) Return the first ChildQuangcao filtered by the NgayDang column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuangcao requireOneByLink(string $Link) Return the first ChildQuangcao filtered by the Link column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuangcao requireOneByHinhanh(string $HInhAnh) Return the first ChildQuangcao filtered by the HInhAnh column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildQuangcao requireOneByLoaiquangcaoMaloaiquangcao(int $LoaiQuangCao_MaLoaiQuangCao) Return the first ChildQuangcao filtered by the LoaiQuangCao_MaLoaiQuangCao column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildQuangcao[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildQuangcao objects based on current ModelCriteria
 * @method     ChildQuangcao[]|ObjectCollection findByMaquangcao(int $MaQuangCao) Return ChildQuangcao objects filtered by the MaQuangCao column
 * @method     ChildQuangcao[]|ObjectCollection findByNoidung(string $NoiDung) Return ChildQuangcao objects filtered by the NoiDung column
 * @method     ChildQuangcao[]|ObjectCollection findByNgaydang(string $NgayDang) Return ChildQuangcao objects filtered by the NgayDang column
 * @method     ChildQuangcao[]|ObjectCollection findByLink(string $Link) Return ChildQuangcao objects filtered by the Link column
 * @method     ChildQuangcao[]|ObjectCollection findByHinhanh(string $HInhAnh) Return ChildQuangcao objects filtered by the HInhAnh column
 * @method     ChildQuangcao[]|ObjectCollection findByLoaiquangcaoMaloaiquangcao(int $LoaiQuangCao_MaLoaiQuangCao) Return ChildQuangcao objects filtered by the LoaiQuangCao_MaLoaiQuangCao column
 * @method     ChildQuangcao[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class QuangcaoQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Base\QuangcaoQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'quanlybanhang', $modelName = '\\Model\\Quangcao', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildQuangcaoQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildQuangcaoQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildQuangcaoQuery) {
            return $criteria;
        }
        $query = new ChildQuangcaoQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$MaQuangCao, $LoaiQuangCao_MaLoaiQuangCao] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildQuangcao|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(QuangcaoTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = QuangcaoTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
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
     * @return ChildQuangcao A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT MaQuangCao, NoiDung, NgayDang, Link, HInhAnh, LoaiQuangCao_MaLoaiQuangCao FROM QuangCao WHERE MaQuangCao = :p0 AND LoaiQuangCao_MaLoaiQuangCao = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildQuangcao $obj */
            $obj = new ChildQuangcao();
            $obj->hydrate($row);
            QuangcaoTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
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
     * @return ChildQuangcao|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
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
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(QuangcaoTableMap::COL_MAQUANGCAO, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(QuangcaoTableMap::COL_MAQUANGCAO, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the MaQuangCao column
     *
     * Example usage:
     * <code>
     * $query->filterByMaquangcao(1234); // WHERE MaQuangCao = 1234
     * $query->filterByMaquangcao(array(12, 34)); // WHERE MaQuangCao IN (12, 34)
     * $query->filterByMaquangcao(array('min' => 12)); // WHERE MaQuangCao > 12
     * </code>
     *
     * @param     mixed $maquangcao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByMaquangcao($maquangcao = null, $comparison = null)
    {
        if (is_array($maquangcao)) {
            $useMinMax = false;
            if (isset($maquangcao['min'])) {
                $this->addUsingAlias(QuangcaoTableMap::COL_MAQUANGCAO, $maquangcao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($maquangcao['max'])) {
                $this->addUsingAlias(QuangcaoTableMap::COL_MAQUANGCAO, $maquangcao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuangcaoTableMap::COL_MAQUANGCAO, $maquangcao, $comparison);
    }

    /**
     * Filter the query on the NoiDung column
     *
     * Example usage:
     * <code>
     * $query->filterByNoidung('fooValue');   // WHERE NoiDung = 'fooValue'
     * $query->filterByNoidung('%fooValue%'); // WHERE NoiDung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noidung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByNoidung($noidung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noidung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noidung)) {
                $noidung = str_replace('*', '%', $noidung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuangcaoTableMap::COL_NOIDUNG, $noidung, $comparison);
    }

    /**
     * Filter the query on the NgayDang column
     *
     * Example usage:
     * <code>
     * $query->filterByNgaydang('2011-03-14'); // WHERE NgayDang = '2011-03-14'
     * $query->filterByNgaydang('now'); // WHERE NgayDang = '2011-03-14'
     * $query->filterByNgaydang(array('max' => 'yesterday')); // WHERE NgayDang > '2011-03-13'
     * </code>
     *
     * @param     mixed $ngaydang The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByNgaydang($ngaydang = null, $comparison = null)
    {
        if (is_array($ngaydang)) {
            $useMinMax = false;
            if (isset($ngaydang['min'])) {
                $this->addUsingAlias(QuangcaoTableMap::COL_NGAYDANG, $ngaydang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ngaydang['max'])) {
                $this->addUsingAlias(QuangcaoTableMap::COL_NGAYDANG, $ngaydang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuangcaoTableMap::COL_NGAYDANG, $ngaydang, $comparison);
    }

    /**
     * Filter the query on the Link column
     *
     * Example usage:
     * <code>
     * $query->filterByLink('fooValue');   // WHERE Link = 'fooValue'
     * $query->filterByLink('%fooValue%'); // WHERE Link LIKE '%fooValue%'
     * </code>
     *
     * @param     string $link The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByLink($link = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($link)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $link)) {
                $link = str_replace('*', '%', $link);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuangcaoTableMap::COL_LINK, $link, $comparison);
    }

    /**
     * Filter the query on the HInhAnh column
     *
     * Example usage:
     * <code>
     * $query->filterByHinhanh('fooValue');   // WHERE HInhAnh = 'fooValue'
     * $query->filterByHinhanh('%fooValue%'); // WHERE HInhAnh LIKE '%fooValue%'
     * </code>
     *
     * @param     string $hinhanh The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByHinhanh($hinhanh = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($hinhanh)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $hinhanh)) {
                $hinhanh = str_replace('*', '%', $hinhanh);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(QuangcaoTableMap::COL_HINHANH, $hinhanh, $comparison);
    }

    /**
     * Filter the query on the LoaiQuangCao_MaLoaiQuangCao column
     *
     * Example usage:
     * <code>
     * $query->filterByLoaiquangcaoMaloaiquangcao(1234); // WHERE LoaiQuangCao_MaLoaiQuangCao = 1234
     * $query->filterByLoaiquangcaoMaloaiquangcao(array(12, 34)); // WHERE LoaiQuangCao_MaLoaiQuangCao IN (12, 34)
     * $query->filterByLoaiquangcaoMaloaiquangcao(array('min' => 12)); // WHERE LoaiQuangCao_MaLoaiQuangCao > 12
     * </code>
     *
     * @see       filterByLoaiquangcao()
     *
     * @param     mixed $loaiquangcaoMaloaiquangcao The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByLoaiquangcaoMaloaiquangcao($loaiquangcaoMaloaiquangcao = null, $comparison = null)
    {
        if (is_array($loaiquangcaoMaloaiquangcao)) {
            $useMinMax = false;
            if (isset($loaiquangcaoMaloaiquangcao['min'])) {
                $this->addUsingAlias(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $loaiquangcaoMaloaiquangcao['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($loaiquangcaoMaloaiquangcao['max'])) {
                $this->addUsingAlias(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $loaiquangcaoMaloaiquangcao['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $loaiquangcaoMaloaiquangcao, $comparison);
    }

    /**
     * Filter the query by a related \Model\Loaiquangcao object
     *
     * @param \Model\Loaiquangcao|ObjectCollection $loaiquangcao The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildQuangcaoQuery The current query, for fluid interface
     */
    public function filterByLoaiquangcao($loaiquangcao, $comparison = null)
    {
        if ($loaiquangcao instanceof \Model\Loaiquangcao) {
            return $this
                ->addUsingAlias(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $loaiquangcao->getMaloaiquangcao(), $comparison);
        } elseif ($loaiquangcao instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO, $loaiquangcao->toKeyValue('PrimaryKey', 'Maloaiquangcao'), $comparison);
        } else {
            throw new PropelException('filterByLoaiquangcao() only accepts arguments of type \Model\Loaiquangcao or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Loaiquangcao relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function joinLoaiquangcao($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Loaiquangcao');

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
            $this->addJoinObject($join, 'Loaiquangcao');
        }

        return $this;
    }

    /**
     * Use the Loaiquangcao relation Loaiquangcao object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\LoaiquangcaoQuery A secondary query class using the current class as primary query
     */
    public function useLoaiquangcaoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLoaiquangcao($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Loaiquangcao', '\Model\LoaiquangcaoQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildQuangcao $quangcao Object to remove from the list of results
     *
     * @return $this|ChildQuangcaoQuery The current query, for fluid interface
     */
    public function prune($quangcao = null)
    {
        if ($quangcao) {
            $this->addCond('pruneCond0', $this->getAliasedColName(QuangcaoTableMap::COL_MAQUANGCAO), $quangcao->getMaquangcao(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(QuangcaoTableMap::COL_LOAIQUANGCAO_MALOAIQUANGCAO), $quangcao->getLoaiquangcaoMaloaiquangcao(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Deletes all rows from the QuangCao table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(QuangcaoTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            QuangcaoTableMap::clearInstancePool();
            QuangcaoTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(QuangcaoTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(QuangcaoTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            QuangcaoTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            QuangcaoTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // QuangcaoQuery
