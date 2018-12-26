<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 12/26/2018
 * Time: 2:47 PM
 */

namespace SoftUniBlogBundle\Service;


use SoftUniBlogBundle\Entity\Quote;

interface QuuteServicesInterface
{
    public function objectToString(Quote $quote);
    public function stringToObject(Quote $quote);

}