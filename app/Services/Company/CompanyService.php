<?php

namespace App\Services\Company;

use App\Models\Company;
use App\Services\Company\ICompanyService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CompanyService implements ICompanyService
{

    protected $company;

    function __construct(Company $company) {
        $this->company = $company;
    }
    /**
    * get All Customers
    *
    * @return Collection<App\Models\Customer>
    */
    public function all(){
        return Company::query()->orderby('created_at','desc')->get();
    }

    /**
    * find Customer By ID
    * @param int $id
    * @return App\Models\Customer
    */
    public function find($id){
        return Company::where('id',$id)->first();
    }
    /**
    * Create new Customer
    *
    * @param Array $data
    * @return App\Models\Customer
    */
    public function create($data){
        $company =  Company::create($data);
        return $company;
    }

    /**
    * update existing Customer
    *
    * @param Array $data
    * @param App\Models\Customer $Customer
    * @return boolean
    */
    public function update($id, $data){
        $company = $this->find($id);

        $company->update($data);

        return $company;
    }


    /**
    * delete existing Customer
    *
    * @param int $id
    * @return boolean
    */
    public function delete($id){
        return Company::destroy($id);
    }



}
