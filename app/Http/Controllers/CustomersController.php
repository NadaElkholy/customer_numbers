<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CustomerRepository;
use App\Models\Customer;
use App\Helpers;

class CustomersController extends Controller
{
    //
    /** @var  CustomerRepository */
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepo)
    {
        $this->customerRepository = $customerRepo;
    }

    /**
     * Display a listing of the Customer.
     *
     * @param CustomerDataTable $customerDataTable
     * @return Response
     */
    public function index(Request $request)
    {
        if(!$request->all() || (!isset($request->state) && !isset($request->country))){
            $customers_phones = $this->customerRepository->all();
        }else{
            //request has search parameters
            if(isset($request->state) && !isset($request->country)){
                $customers_phones = $this->customerRepository->getStateOfCustomerNumbers($request->state);
            }elseif(!isset($request->state) && isset($request->country)){
                $customers_phones = $this->customerRepository->getCountryOfCustomerNumbers($request->country);
            }elseif(isset($request->state) && isset($request->country)){
                $customers_phones = $this->customerRepository->getCustomerNumbersSearch($request->state, $request->country);
            }
        }

        return view('customers.index', compact('customers_phones'));
    }

}
