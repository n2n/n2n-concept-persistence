<?php
/*
 * Copyright (c) 2012-2016, Hofmänner New Media.
 * DO NOT ALTER OR REMOVE COPYRIGHT NOTICES OR THIS FILE HEADER.
 *
 * This file is part of the N2N FRAMEWORK.
 *
 * The N2N FRAMEWORK is free software: you can redistribute it and/or modify it under the terms of
 * the GNU Lesser General Public License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * N2N is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even
 * the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Lesser General Public License for more details: http://www.gnu.org/licenses/
 *
 * The following people participated in this project:
 *
 * Andreas von Burg.....: Architect, Lead Developer
 * Bert Hofmänner.......: Idea, Frontend UI, Community Leader, Marketing
 * Thomas Günther.......: Developer, Hangar
 */
namespace n2n\spec\dbo\meta\data;

interface SelectStatementBuilder {
	public function addSelectColumn(QueryItem $item, string $asName = null): void;
	/**
	 * @param bool $distinct
	 */
	public function setDistinct(bool $distinct): void;

	public function addFrom(QueryResult $queryResult, $alias = null): void;

	public function addJoin($joinType, QueryResult $queryResult, $alias = null, ComparisonBuilder $onComparator = null): ComparisonBuilder;

	public function getWhereComparator(): ComparisonBuilder;

	public function addGroup(QueryItem $queryItem): void;

	public function addOrderBy(QueryItem $queryItem, string $direction);

	public function getHavingComparator(): ComparisonBuilder;

	public function setLimit(int $limit, int $num = null): void;

	function setLockMode(?LockMode $lockMode): void;

	public function toSqlString(): string;

	public function toQueryResult(): QueryResult;

	public function toFromQueryResult(): QueryResult;
}