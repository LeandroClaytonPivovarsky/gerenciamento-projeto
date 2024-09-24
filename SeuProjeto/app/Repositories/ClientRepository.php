<?php

namespace App\Repositories;

use App\Models\Client;

class ClientRepository extends Repository{

    public function __construct() {
        parent::__construct(new Client());
    }
    
    public function getRows(){ return $this->rows; }


}