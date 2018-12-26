<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 12/26/2018
 * Time: 2:21 PM
 */

namespace SoftUniBlogBundle\Service;


use SoftUniBlogBundle\Entity\Quote;

class QuoteServices implements QuоteServicesInterface
{
    public function objectToString(Quote $quote){
        $relatedQuotes='';
        foreach($quote->getRelatedQuotes() as $key=>$value){
            $relatedQuotes.=','.$value->getId();
        }
        $relatedQuotes=substr($relatedQuotes,1);

        if(strlen($relatedQuotes)>1) {
            $related = substr($relatedQuotes, 1);
            $quote->setRelatedQuotes($relatedQuotes);
        }

    }
    public function stringToObject(Quote $quote){
        $relation=$quote->getRelatedQuotes();
        $relation=explode(",",$relation);
        $related=[];
        foreach($relation as $value){
            $sql = $this
                ->getDoctrine()
                ->getRepository(Quote::class)
                ->find($value);
            $related[]=$sql;
        }
        $related['count']=count($relation);
        return $related;
    }
}