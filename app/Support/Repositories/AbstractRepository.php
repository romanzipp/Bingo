<?php

namespace Support\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Traits\ForwardsCalls;
use InvalidArgumentException;
use Support\Repositories\Concerns\BuildsResources;
use Support\Repositories\Contracts\RepositoryContract;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
abstract class AbstractRepository implements RepositoryContract
{
    use ForwardsCalls;
    use BuildsResources;

    protected Builder $query;

    protected bool $prepared = false;

    protected array $with = [];

    protected array $withCount = [];

    protected bool $paginate = false;

    protected ?int $paginationPerPage = null;

    public function __construct()
    {
        $this->query = $this->newQuery();
    }

    /**
     * Create a new Repository instance.
     *
     * @return static
     */
    public static function make()
    {
        return new static();
    }

    /**
     * Create a new Repository instance.
     *
     * @return static
     */
    public function __invoke()
    {
        return $this->fresh();
    }

    /**
     * Create a new Repository instance.
     *
     * @return static
     */
    public function fresh()
    {
        return new static();
    }

    /**
     * Get the current Eloquent Query Builder.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->query;
    }

    /**
     * Prepare the query with adding relation & relation count loading.
     *
     * @return $this
     */
    public function prepare(): AbstractRepository
    {
        if ($this->prepared) {
            return $this;
        }

        $this
            ->query
            ->with($this->with)
            ->withCount($this->withCount);

        $this->prepared = true;

        return $this;
    }

    /**
     * Paginate the query.
     *
     * @param int|null $perPage
     *
     * @return $this
     */
    public function paginate(int $perPage = null): AbstractRepository
    {
        $this->paginate = true;
        $this->paginationPerPage = $perPage;

        return $this;
    }

    /*
     *--------------------------------------------------------------------------
     * Builder Overrides
     *--------------------------------------------------------------------------
     */

    public function exists(): bool
    {
        return $this->prepare()->query()->exists();
    }

    public function count($columns = '*'): int
    {
        return $this->prepare()->query()->count($columns);
    }

    public function get($columns = '*'): Collection
    {
        return $this->prepare()->query()->get($columns);
    }

    /*
     *--------------------------------------------------------------------------
     * Protected Methods
     *--------------------------------------------------------------------------
     */

    /**
     * Fetch the query results.
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    protected function fetch()
    {
        $this->prepare();

        if ($this->paginate) {
            return $this
                ->query()
                ->paginate($this->paginationPerPage)
                ->appends($this->getRequest()->query());
        }

        return $this->query()->get();
    }

    /**
     * Get the current request.
     *
     * @return \Illuminate\Http\Request
     */
    public function getRequest(): Request
    {
        return request();
    }

    /**
     * Spawn a new query instance.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function newQuery(): Builder
    {
        return app($this->getModelClass())->query();
    }

    /**
     * Handle dynamic method calls into the query builder.
     *
     * @param string $method
     * @param array $parameters
     *
     * @return \Support\Repositories\AbstractRepository
     */
    public function __call($method, $parameters)
    {
        if (in_array($method, ['get', 'paginate', 'exists'])) {
            throw new InvalidArgumentException('Fetch method must be called through repository methods');
        }

        $this->forwardCallTo($this->query, $method, $parameters);

        return $this;
    }
}
