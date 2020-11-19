<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface BaseRepository
 * @package App\Repositories
 */
interface BaseRepository
{
    /**
     * @param int $id
     * @return $model
     */
    public function find($id, $is = false);

    /**
     * Return a collection of all elements of the resource
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    public function findWhere($id, string $column);

    /**
     * Paginate the model to $perPage items per page
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage = 25);

    /**
     * Create a resource
     * @param  $data
     * @return Model
     */
    public function create($data);

    /**
     * Update a resource
     * @param  $model
     * @param array $data
     * @return Model
     */
//    public function update($model, $data);

    public function update(string $column, $id, $data);

    /**
     * Destroy a resource
     * @param  $model
     * @return bool
     */
    public function destroy($model);

    /**
     * Find a resource by the given slug
     * @param string $slug
     * @return $model
     */
    public function findBySlug($slug, $status = false);

    /**
     * Find a resource by the given slug
     * @param string $email
     * @return $model
     */
    public function findByEmail($email);

    /**
     * Find a resource by an array of attributes
     * @param array $attributes
     * @return $model
     */
    public function findByAttributes(array $attributes);

    /**
     * Return a collection of elements who's ids match
     * @param array $ids
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByMany(array $ids);

    /**
     * Get resources by an array of attributes
     * @param array $attributes
     * @param null|string $orderBy
     * @param string $sortOrder
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getByAttributes(array $attributes, $orderBy = null, $sortOrder = 'asc');

    /**
     * Clear the cache for this Repositories' Entity
     * @return bool
     */
    public function clearCache();
}
