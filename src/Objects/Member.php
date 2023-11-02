<?php

namespace bernier154\PhpCyberimpact\Objects;


/**
 * Member
 */
class Member
{
    public $id;
    public $firstname;
    public $lastname;
    public $company;
    public $email;
    public $gender;
    public $language;
    public $joinedOn;
    public $updatedOn;
    public $consentType;
    public $postalCode;
    public $country;
    public $note;
    public $birthdate;
    public $mailingsReceived;
    public $mailingsOpened;
    public $mailingsClicked;
    public $customFields;

    public function __construct(
        $id = null,
        $firstname = "",
        $lastname = "",
        $company = "",
        $email = "",
        $gender = "",
        $language = "",
        $joinedOn = "",
        $updatedOn = "",
        $consentType = "",
        $postalCode = "",
        $country = "",
        $note = "",
        $birthdate = "",
        $mailingsReceived = 0,
        $mailingsOpened = 0,
        $mailingsClicked = 0,
        $customFields = []
    ) {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->company = $company;
        $this->email = $email;
        $this->gender = $gender;
        $this->language = $language;
        $this->joinedOn = $joinedOn;
        $this->updatedOn = $updatedOn;
        $this->consentType = $consentType;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->note = $note;
        $this->birthdate = $birthdate;
        $this->mailingsReceived = $mailingsReceived;
        $this->mailingsOpened = $mailingsOpened;
        $this->mailingsClicked = $mailingsClicked;
        $this->customFields = $customFields;
    }

    /**
     * Create a Member from the return value of the API.
     *
     * @param  object $json
     * @return Member
     */
    static function fromJSON($json)
    {
        return new self(
            $json->id ?? null,
            $json->firstname,
            $json->lastname,
            $json->company,
            $json->email,
            $json->gender,
            $json->language,
            $json->joinedOn,
            $json->updatedOn,
            $json->consentType,
            $json->postalCode,
            $json->country,
            $json->note,
            $json->birthdate,
            $json->mailingsReceived,
            $json->mailingsOpened,
            $json->mailingsClicked,
            (array) $json->customFields
        );
    }
}
