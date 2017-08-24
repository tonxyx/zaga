<?php
namespace app\models;

use Yii;
use yii\base\Model;

class GadgetsFilterForm extends Model
{
    public $priceFrom;
    public $priceTo;
    public $storageFrom;
    public $storageTo;

    public function rules()
    {
        return [
            [['priceFrom', 'priceTo', 'storageFrom', 'storageTo'], 'number', 'min' => 0],
        ];
    }

    public function attributeLabels()
    {
        return [
            'priceFrom' => 'Cijena od',
            'priceTo' => 'Cijena do',
            'storageFrom' => 'Zapremnina od',
            'storageTo' => 'Zapremnina do',
        ];
    }

    public function parse()
    {
        $filters = [];

        if ($this->priceFrom > 0 || $this->priceTo > 0) {
            $filters['price'] = [$this->priceFrom, $this->priceTo];
        }

        if ($this->storageFrom > 0 || $this->storageTo > 0) {
            $filters['storage'] = [$this->storageFrom, $this->storageTo];
        }

        return $filters;
    }
}
