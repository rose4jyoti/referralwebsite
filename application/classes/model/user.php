<?php
/**
 * Created by PhpStorm.
 * User: legacy
 * Date: 7/1/14
 * Time: 10:18 PM
 */

class Model_User extends Model_Auth_User  {


    /**
     * Détails pour remplir un dodirectpayment.
     *
     * @return array
     */
    public function directpayment_details() {
        return array(
            'COMPANY' => '',
            'FIRSTNAME' => $this->customerCFirstName,
            'LASTNAME' => $this->customerCLastName,
            'EMAIL' => $this->email,
            // Localization
            'STREET' => $this->customerAddress1,
            'STREET2' => $this->customerAddress2,
            'STATE' => $this->customerStateProvID,
            'ZIP' => $this->customerZip,
            'CITY' => $this->customerCity,
            'COUNTRY' => $this->customerCountryID,
            'SHIPTONAME' => $this->customerName,
            'SHIPTOPHONENUM' => $this->customerPhone,
            'SHIPTOFAXNUM' => ''
        );
    }

} 