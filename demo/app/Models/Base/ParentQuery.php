<?php

namespace App\Models\Base;

use \Exception;
use \PDO;
use App\Models\Parent as ChildParent;
use App\Models\ParentQuery as ChildParentQuery;
use App\Models\Map\ParentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'parent' table.
 *
 *
 *
 * @method     ChildParentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildParentQuery orderByGenderId($order = Criteria::ASC) Order by the gender_id column
 * @method     ChildParentQuery orderByName($order = Criteria::ASC) Order by the name column
 * @method     ChildParentQuery orderByDateOfBirth($order = Criteria::ASC) Order by the date_of_birth column
 *
 * @method     ChildParentQuery groupById() Group by the id column
 * @method     ChildParentQuery groupByGenderId() Group by the gender_id column
 * @method     ChildParentQuery groupByName() Group by the name column
 * @method     ChildParentQuery groupByDateOfBirth() Group by the date_of_birth column
 *
 * @method     ChildParentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildParentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildParentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildParentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildParentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildParentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildParentQuery leftJoinGender($relationAlias = null) Adds a LEFT JOIN clause to the query using the Gender relation
 * @method     ChildParentQuery rightJoinGender($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Gender relation
 * @method     ChildParentQuery innerJoinGender($relationAlias = null) Adds a INNER JOIN clause to the query using the Gender relation
 *
 * @method     ChildParentQuery joinWithGender($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Gender relation
 *
 * @method     ChildParentQuery leftJoinWithGender() Adds a LEFT JOIN clause and with to the query using the Gender relation
 * @method     ChildParentQuery rightJoinWithGender() Adds a RIGHT JOIN clause and with to the query using the Gender relation
 * @method     ChildParentQuery innerJoinWithGender() Adds a INNER JOIN clause and with to the query using the Gender relation
 *
 * @method     \App\Models\GenderQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildParent findOne(ConnectionInterface $con = null) Return the first ChildParent matching the query
 * @method     ChildParent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildParent matching the query, or a new ChildParent object populated from the query conditions when no match is found
 *
 * @method     ChildParent findOneById(int $id) Return the first ChildParent filtered by the id column
 * @method     ChildParent findOneByGenderId(int $gender_id) Return the first ChildParent filtered by the gender_id column
 * @method     ChildParent findOneByName(string $name) Return the first ChildParent filtered by the name column
 * @method     ChildParent findOneByDateOfBirth(string $date_of_birth) Return the first ChildParent filtered by the date_of_birth column *

 * @method     ChildParent requirePk($key, ConnectionInterface $con = null) Return the ChildParent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildParent requireOne(ConnectionInterface $con = null) Return the first ChildParent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildParent requireOneById(int $id) Return the first ChildParent filtered by the id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildParent requireOneByGenderId(int $gender_id) Return the first ChildParent filtered by the gender_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildParent requireOneByName(string $name) Return the first ChildParent filtered by the name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildParent requireOneByDateOfBirth(string $date_of_birth) Return the first ChildParent filtered by the date_of_birth column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildParent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildParent objects based on current ModelCriteria
 * @method     ChildParent[]|ObjectCollection findById(int $id) Return ChildParent objects filtered by the id column
 * @method     ChildParent[]|ObjectCollection findByGenderId(int $gender_id) Return ChildParent objects filtered by the gender_id column
 * @method     ChildParent[]|ObjectCollection findByName(string $name) Return ChildParent objects filtered by the name column
 * @method     ChildParent[]|ObjectCollection findByDateOfBirth(string $date_of_birth) Return ChildParent objects filtered by the date_of_birth column
 * @method     ChildParent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ParentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \App\Models\Base\ParentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'mysql', $modelName = '\\App\\Models\\Parent', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildParentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildParentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildParentQuery) {
            return $criteria;
        }
        $query = new ChildParentQuery();
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
     * @return ChildParent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ParentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ParentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildParent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id, gender_id, name, date_of_birth FROM parent WHERE id = :p0';
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
            /** @var ChildParent $obj */
            $obj = new ChildParent();
            $obj->hydrate($row);
            ParentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildParent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ParentTableMap::COL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ParentTableMap::COL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(ParentTableMap::COL_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(ParentTableMap::COL_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParentTableMap::COL_ID, $id, $comparison);
    }

    /**
     * Filter the query on the gender_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGenderId(1234); // WHERE gender_id = 1234
     * $query->filterByGenderId(array(12, 34)); // WHERE gender_id IN (12, 34)
     * $query->filterByGenderId(array('min' => 12)); // WHERE gender_id > 12
     * </code>
     *
     * @see       filterByGender()
     *
     * @param     mixed $genderId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function filterByGenderId($genderId = null, $comparison = null)
    {
        if (is_array($genderId)) {
            $useMinMax = false;
            if (isset($genderId['min'])) {
                $this->addUsingAlias(ParentTableMap::COL_GENDER_ID, $genderId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($genderId['max'])) {
                $this->addUsingAlias(ParentTableMap::COL_GENDER_ID, $genderId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParentTableMap::COL_GENDER_ID, $genderId, $comparison);
    }

    /**
     * Filter the query on the name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParentTableMap::COL_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the date_of_birth column
     *
     * Example usage:
     * <code>
     * $query->filterByDateOfBirth('2011-03-14'); // WHERE date_of_birth = '2011-03-14'
     * $query->filterByDateOfBirth('now'); // WHERE date_of_birth = '2011-03-14'
     * $query->filterByDateOfBirth(array('max' => 'yesterday')); // WHERE date_of_birth > '2011-03-13'
     * </code>
     *
     * @param     mixed $dateOfBirth The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function filterByDateOfBirth($dateOfBirth = null, $comparison = null)
    {
        if (is_array($dateOfBirth)) {
            $useMinMax = false;
            if (isset($dateOfBirth['min'])) {
                $this->addUsingAlias(ParentTableMap::COL_DATE_OF_BIRTH, $dateOfBirth['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dateOfBirth['max'])) {
                $this->addUsingAlias(ParentTableMap::COL_DATE_OF_BIRTH, $dateOfBirth['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ParentTableMap::COL_DATE_OF_BIRTH, $dateOfBirth, $comparison);
    }

    /**
     * Filter the query by a related \App\Models\Gender object
     *
     * @param \App\Models\Gender|ObjectCollection $gender The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildParentQuery The current query, for fluid interface
     */
    public function filterByGender($gender, $comparison = null)
    {
        if ($gender instanceof \App\Models\Gender) {
            return $this
                ->addUsingAlias(ParentTableMap::COL_GENDER_ID, $gender->getId(), $comparison);
        } elseif ($gender instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(ParentTableMap::COL_GENDER_ID, $gender->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGender() only accepts arguments of type \App\Models\Gender or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Gender relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function joinGender($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Gender');

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
            $this->addJoinObject($join, 'Gender');
        }

        return $this;
    }

    /**
     * Use the Gender relation Gender object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \App\Models\GenderQuery A secondary query class using the current class as primary query
     */
    public function useGenderQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinGender($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Gender', '\App\Models\GenderQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildParent $parent Object to remove from the list of results
     *
     * @return $this|ChildParentQuery The current query, for fluid interface
     */
    public function prune($parent = null)
    {
        if ($parent) {
            $this->addUsingAlias(ParentTableMap::COL_ID, $parent->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the parent table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ParentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ParentTableMap::clearInstancePool();
            ParentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ParentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ParentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ParentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ParentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ParentQuery
