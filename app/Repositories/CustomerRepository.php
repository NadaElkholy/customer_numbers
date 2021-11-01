<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Repositories\BaseRepository;

/**
 * Class CustomerRepository
 * @package App\Repositories
 * @version October 24, 2021, 12:36 am UTC
*/

class CustomerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'phone',
        'country',
        'state',
        'code',
        'phone_num'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Customer::class;
    }

    public function getValidCustomerNumbers()
    {
        $query = $this->model->get();
        return $query->where('state', 'OK');
    }

    public function getNonValidCustomerNumbers()
    {
        $query = $this->model->get();
        return $query->where('state', 'NOK');
    }

    public function getStateOfCustomerNumbers($state)
    {
        $query = $this->model->get();
        return $query->where('state', $state);
    }

    public function getCountryOfCustomerNumbers($country)
    {
        $query = $this->model->get();
        return $query->where('country', $country);
    }

    public function getCustomerNumbersSearch($state,$country)
    {
        $query = $this->model->get();
        return $query->where('state', $state)->where('country', $country);
    }
}
